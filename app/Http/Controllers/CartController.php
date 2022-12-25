<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Helper\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Mail\OrderMail;
use Mail;

class CartController extends Controller
{
    public function view()
    {
        return view('cart-view');
    }

    public function add(Product $product, Cart $cart)
    {
        $quantity = request('quantity', 1);
        $cart->create($product, $quantity);
        return redirect()->route('cart.view');
       
    }

    public function delete($id, Cart $cart)
    {
        $cart->delete($id);
        return redirect()->route('cart.view');
    }

    public function update($ids, $quantity, Cart $cart)
    {
        dd ($ids, $quantity, $cart);
        return redirect()->route('cart.view');
    }

    public function clear(Cart $cart)
    {
       $cart->clear();
       return redirect()->route('cart.view');
    }

    public function updateAll(Cart $cart)
    {
        $ids = request('id', []);
        $quantites = request('quantity', []);
        for ($i=0; $i < count($ids); $i++) { 
            $cart->update($ids[$i], $quantites[$i]);
        }
        return redirect()->route('cart.view');
        // dd ($ids, $quantites);
    }
    public function checkout()
    {
        $auth = auth('cus')->user();
        return view('checkout', compact('auth'));
    }

    public function order_checkout(Cart $cart)
    {
        if ($cart->totalQuantity == 0) {
            return redirect()->route('home.index')->with('no', 'Đơn hàng rỗng, vui lòng thêm sản phẩm vào giỏ hàng');
        }
        
        $form_data = request()->only('name','email','phone','address','order_note','shipping_method','payment_method');

        $form_data['account_id'] = auth('cus')->id();
        $order = Order::create($form_data);
        try {
            
            foreach ($cart->items as $item) {
                $dt_data = [
                    'product_id' => $item->id,
                    'order_id' => $order->id,
                    'quantity' =>  $item->quantity,
                    'price' =>  $item->price
                ];

                OrderDetail::create($dt_data);
            }

            // gưi mail xác nhan
            $email = auth('cus')->user()->email;
            $token = \Str::random(50);
            $order->update(['token' => $token]);
            Mail::to($email)->send(new OrderMail($order, $token));
            // xóa sesion đi
            $cart->clear();
            return redirect()->route('home.index')->with('yes', 'Đặ hàng thành công, hãy check email để xác nhận đơn màng');
        } catch (\Throwable $th) {
            OrderDetail::where('order_id', $order->id)->delete();
            $order->delete();

            dd ('Loi roi');
        }
        dd ($form_data);
    }

    public function verifyOrder($token)
    {
        $order = Order::where('token', $token)->firstOrFail();
        $order->update(['token' => null, 'status' => 1]);
        return redirect()->route('home.index')->with('yes', 'Xác nhận đơn hàng thành công');
    }
}