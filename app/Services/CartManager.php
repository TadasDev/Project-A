<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Support\Facades\Session;

class CartManager
{

    public function totalPrice()
    {
        $total = 0;

        $cartItems = session()->get('cart');

        foreach ($cartItems as $item) {
            if ($item) {
                $total += $item['book']->price * $item['quantity'];
            } else
                $total = 0;
        }
        session()->put('total', $total);

    }

    public function addToCart($id)
    {

        $book = Book::findorfail($id);

        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if (!$cart) {
            $cart = [
                $id => [
                    'book' => $book,
                    'quantity' => 1
                ]
            ];
            session()->put('cart', $cart);

        } elseif (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);

        } else {
            $cart[$id] = [
                'book' => $book,
                'quantity' => 1
            ];
            session()->put('cart', $cart);

            $this->totalPrice();
        }

    }

    public function removePrice($id)
    {

        $cart = Session::get('cart');
        $total = Session::get('total');

        $price = $cart[$id]['book']->price;
        $quantity = $cart[$id]['quantity'];
        $itemsPrice = $price * $quantity;
        $cartPrice = $total - $itemsPrice;
        if ($cartPrice < 0) {
            $cartPrice = null;
            session()->put('total', $cartPrice);
        }
        session()->put('total', $cartPrice);

    }

    public function removeItem($id)
    {
        $cart = Session::get('cart');
        unset($cart[$id]);
        $this->removePrice($id);

        session()->put('cart', $cart);

    }

    public function addQuantity($id)
    {
        $cart = Session::get('cart');
        $cart[$id]['quantity'] += 1;
        session()->put('cart', $cart);

        $this->totalPrice();
    }

    public function removeQuantity($id)
    {

        $cart = Session::get('cart');
        $cart[$id]['quantity'] -= 1;
        if ($cart[$id]['quantity'] < 2) {
            $cart[$id]['quantity'] = 1;
        }

        session()->put('cart', $cart);

        $this->totalPrice();
    }
}
