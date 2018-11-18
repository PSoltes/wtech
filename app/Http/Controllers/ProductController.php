<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('productDetail', compact('product', $product));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request)
    {
        if (Auth::check()) {

        } else {
            $product = Product::find($request->input('id'));

           /* if (!$product) {

                abort(404);

            }*/

            $cart = session()->get('cart');

            // if cart is empty then this the first product
            if (!$cart) {

                $cart = [
                    $product->id => [
                        "name" => $product->name,
                        "amount" => $request->input('amnt'),
                        "price" => $product->price,
                        "imgsource" => $product->imgsource
                    ]
                ];

                session()->put('cart', $cart);

                return redirect()->back()->with('success', 'Product added to cart successfully!');
            }

            // if cart not empty then check if this product exist then increment quantity
            if (isset($cart[$product->id])) {

                $cart[$product->id]['amount'] += $request->input('amnt');

                session()->put('cart', $cart);

                return redirect()->back()->with('success', 'Product added to cart successfully!');

            }

            // if item not exist in cart then add to cart with quantity = 1
            $cart[$product->id] = [
                "name" => $product->name,
                "amount" => $request->input('amnt'),
                "price" => $product->price,
                "imgsource" => $product->imgsource
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
    }

    public function updateCart(Request $request)
    {
        if (Auth::check()) {

        } else {

            if ($request->has('id') && $request->has('amount')) {
                $cart = session()->get('cart');
                $cart[$request->input('id')]['amount'] = $request->input('amount');
                session()->put('cart', $cart);
            }
        }

    }


    public function deleteFromCart(Request $request)
    {
        file_put_contents("testMarha.txt", $request->input('id'));

        if(Auth::check())
        {

        } else {
            file_put_contents("testMarha.txt", $request->input('id'));
            if($request->has('id'))
            {
                $cart = session()->get('cart');
                if(isset($cart[$request->input('id')]))
                {
                    unset($cart[$request->input('id')]);
                    session()->put('cart', $cart);
                }
            }
        }

    }
}
