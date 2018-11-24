<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Mylibs\Cart;

class CheckoutController extends Controller
{

    public function index()
    {
        $CartItems = [];
        if (Auth::check()) {
            $products = Auth::user()->products;
            foreach ($products as $product) {
                array_push($CartItems, new Cart($product, $product->cart->amount));
            }

            return view('checkout1', compact('CartItems', $CartItems));
        } else {

            $cart = session()->get('cart');
            if ($cart) {
                foreach ($cart as $id => $item) {
                    $product = Product::find($item['id']);

                    array_push($CartItems, new Cart($product, $item['amount']));
                }
            }
            return view('checkout1', compact('CartItems', $CartItems));
        }
    }

    public function index2()
    {
        return view('checkout2');
    }

    public function index3(Request $request)
    {

        $request->validate([
            'dopravaAnswer' => 'required',
            'paymentAnswer' => 'required',
        ]);

        $order = session()->get('order');

        if (!$order) {
            $order = [

                "delivery" => $request->input('dopravaAnswer'),
                "payment" => $request->input('paymentAnswer')

            ];
        } else {

            $order['delivery'] = $request->input('dopravaAnswer');
            $order['payment'] = $request->input('paymentAnswer');

        }

        session()->put('order', $order);

        return view('checkout3');

    }

    public function addToCart(Request $request)
    {
        if (Auth::check()) {

            $product = Product::find($request->input('id'));
            if (!$product) {

                abort(404);

            }
            $user = Auth::user();
            if ($request->has('id') && $request->has('amnt')) {

                $amount = $user->hasProduct($request->input('id'));

                if ($amount) {
                    $user->products()->updateExistingPivot($request->input('id'), ['amount' => $amount + 1]);

                } else {

                    $user->products()->attach($request->input('id'), ['amount' => $request->input('amnt')]);

                }

                return redirect()->back()->with('success', 'Product added to cart successfully!');
            }
        } else {
            $product = Product::find($request->input('id'));

            if (!$product) {

                abort(404);

            }

            $cart = session()->get('cart');

            // if cart is empty then this the first product
            if (!$cart) {

                $cart = [
                    $product->id => [
                        "id" => $product->id,
                        "amount" => $request->input('amnt'),
                    ]
                ];

                session()->put('cart', $cart);

                return redirect()->back()->with('success', 'Product added to cart successfully!');
            }

            if (isset($cart[$product->id])) {

                $cart[$product->id]['amount'] += $request->input('amnt');

                session()->put('cart', $cart);

                return redirect()->back()->with('success', 'Product added to cart successfully!');
            }

            $cart[$product->id] = [
                "id" => $product->id,
                "amount" => $request->input('amnt'),
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
    }

    public function updateCart(Request $request)
    {

        $request->validate([
            'amount' => 'integer|required',
        ]);
        if (Auth::check()) {

            $user = Auth::user();
            $user->products()->updateExistingPivot($request->input('id'), ['amount' => $request->input('amount')]);

            return $request->input('amount');

        } else {

            if ($request->has('id') && $request->has('amount')) {
                $cart = session()->get('cart');
                $cart[$request->input('id')]['amount'] = $request->input('amount');
                session()->put('cart', $cart);

                return $request->input('amount');
            }
        }

    }


    public function deleteFromCart(Request $request)
    {

        if (Auth::check()) {
            $user = Auth::user();
            $user->products()->detach($request->input('id'));
            return redirect()->back()->with('success', 'Cart updated successfully');
        } else {
            if ($request->has('id')) {
                $cart = session()->get('cart');
                if (isset($cart[$request->input('id')])) {
                    unset($cart[$request->input('id')]);
                    session()->put('cart', $cart);
                }
            }
        }

    }
}
