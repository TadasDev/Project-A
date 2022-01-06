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
        }

    }

    public function removePrice($id)
    {

        $cart = Session::get('cart');
        $total = Session::get('total');

        $price = $cart[$id]['book']->price;
        $cartPrice = $total - $price;
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
        session()->put('cart', $cart);
    }
}
