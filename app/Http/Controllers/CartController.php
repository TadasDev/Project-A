<?php

namespace App\Http\Controllers;

use App\Services\CartManager;
use Illuminate\Contracts\Foundation\Application;
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
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function index()
    {

        $items = Session::get('cart');

        return view('cart.items', compact('items'));
    }

    public function store($id)
    {
        $this->cartManager->addToCart($id);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return
     */
    public function destroy($id): RedirectResponse
    {

        $items = Session::get('cart');
        dd($items[$id]);
        Session::forget();

        return redirect()->back();

    }
}
