<?php 
namespace App\Helper;

class Cart {
    public $items;
    public $totalPrice = 0;
    public $totalQuantity = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
        $this->totalPrice = $this->setTotalPrice();
        $this->totalQuantity = $this->setTotalQuantity();
    }

    public function create($prod, $quantity = 1)
    {
        $id = $prod->id;

        if (isset($this->items[$id])) {
            $this->items[$id]->quantity += $quantity;
        } else {
            $item = (object) [
                'id' => $id,
                'name' => $prod->name,
                'image' => $prod->image,
                'price' => $prod->sale_price > 0 ? $prod->sale_price : $prod->price,
                'quantity' => $quantity
            ];

            $this->items[$id] = $item;
        }
        
        session(['cart' => $this->items]);
    }

    public function delete($id)
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
            session(['cart' => $this->items]);
        }
    }

    public function update($id, $quantity = 1)
    {
        if (isset($this->items[$id])) {
            $this->items[$id]->quantity = $quantity;

            session(['cart' => $this->items]);
        }
    }

    public function clear()
    {
        session(['cart' => null]);
    }

    private function setTotalPrice()
    {
        $total = 0;

        foreach($this->items as $item) {
            $total += $item->quantity * $item->price;
        }

        return $total;
    }

    
    private function setTotalQuantity()
    {
        $total = 0;

        foreach($this->items as $item) {
            $total += $item->quantity;
        }

        return $total;
    }
}