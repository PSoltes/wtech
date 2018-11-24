<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $request->validate([
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'postcode' => 'required|string|max:5',
                't_number' => 'required|string|phone_number',
            ]);

            $order = new Order;
            $order->name = $request->input('name');
            $order->surname = $request->input('surname');
            $order->address = $request->input('address');
            $order->city = $request->input('city');
            $order->postcode = $request->input('postcode');
            $order->t_number = $request->input('t_number');
            $DPorder = session()->get('order');
            if (!$DPorder) {
                abort('404');
            }
            $order->delivery = $DPorder['delivery'];
            $order->payment = $DPorder['payment'];
            if (Auth::check()) {
                $order->user_id = Auth::id();
            }
            $order->save();

            if (Auth::check()) {
                $user = Auth::user();
                $products = $user->products;

                foreach ($products as $product) {
                    $order->products()->attach($product->id, ['amount' => $product->cart->amount]);
                    $user->products()->detach($product->id);
                }

                session()->forget('order');
                return redirect('/');

            } else {

                $cart = session()->get('cart');

                if (!$cart) {
                    abort(404);
                } else {
                    foreach ($cart as $id => $details) {
                        $order->products()->attach($details['id'], ['amount' => $details['amount']]);
                    }
                    session()->forget('order');
                    session()->forget('cart');
                }
            }
        });

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
