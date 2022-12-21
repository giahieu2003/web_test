<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Helper\Cart;

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
}