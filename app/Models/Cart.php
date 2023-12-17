<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart
{
    public $items = [];
    public $totalQty;
    public $totalPrice;

    public function __Construct($cart = null)
    {
        if ($cart) {
            $this->items = $cart->items;
            $this->totalQty = $cart->totalQty;
            $this->totalPrice = $cart->totalPrice;
        } else {
            $this->items = [];
            $this->totalQty = 0;
            $this->totalPrice = 0;
        }
    }

    public function add($product)
    {
        $item = [
            'id' => $product->id,
            'title' => $product->title,
            'price' => $product->price,
            'image' => $product->image,
            'qty' => 0,
        ];

        if (!array_key_exists($product->id, $this->items)) {
            $this->items[$product->id] = $item;
            $this->totalQty += 1;
            $this->totalPrice += $product->price;
        } else {
            $this->totalQty += 1;
            $this->totalPrice += $product->price;
        }
        $this->items[$product->id]['qty'] += 1;
    }

    public function remove($id)
    {
        if (array_key_exists($id, $this->items)) {
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['qty'] * $this->items[$id]['price'];
            unset($this->items[$id]);
        }
    }

    public function increase($id)
    {
        $this->items[$id]['qty'] += 1;
        $this->totalQty += 1;
        $this->totalPrice += $this->items[$id]['price'];
    }

    public function decrease($id)
    {
        $this->items[$id]['qty'] -= 1;
        $this->totalQty -= 1;
        $this->totalPrice -= $this->items[$id]['price'];
        if ($this->items[$id]['qty'] <= 0)
            unset($this->items[$id]);
    }
}
