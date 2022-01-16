<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Services\CartManager;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    private $cartManager;

    public function __construct(
        CartManager $cartManager
    )
    {
        $this->cartManager = $cartManager;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View|Response
     */
    public function index()
    {

        $items = Session::get('cart');

        return view('cart.items', compact('items'));
    }

    public function store($id): RedirectResponse
    {

        $this->cartManager->addToCart($id);
        $this->cartManager->totalPrice();

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|\Illuminate\Contracts\View\View|Response
     */
    public function show($id)
    {
        $book = Book::find($id);

        return view('books.single', compact('book'));
    }


    public function removeQuantity($id): RedirectResponse
    {
        $this->cartManager->removeQuantity($id);
        return redirect()->back();
    }

    public function addQuantity($id): RedirectResponse
    {
        $this->cartManager->addQuantity($id);
        return redirect()->back();

    }

    public function destroy($id): RedirectResponse
    {
        $this->cartManager->removePrice($id);
        $this->cartManager->removeItem($id);

        return redirect()->back();

    }
}
