<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Helper\Cart;
use App\Models\Order;
use App\Models\OrderDetail;

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

            // xóa sesion đi
            // gưi mail xác nhan

            dd ('Ok roi');
        } catch (\Throwable $th) {
            $order->delete();

            dd ('Loi roi');
        }
        dd ($form_data);
    }
}