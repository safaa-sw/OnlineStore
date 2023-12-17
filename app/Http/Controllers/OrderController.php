<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class OrderController extends Controller
{
    /**
     * Functions for user
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allOrders = Auth::user()->orders;
        $index = -1;
        $orders = [];
        foreach ($allOrders as $item) {
            $index += 1;
            $orders[$index] = ([
                'id' => $item->id,
                'done' => $item->done,
            ]);
        }
        //dd($orders);
        $carts = $allOrders->transform(function ($cart, $key) {
            return unserialize($cart->cart);
        });

        return view('order.index', compact('orders', 'carts'));
    }

    /**
     * Confirm order
     */
    public function confirmOrder()
    {
        Auth::user()->orders()->create([
            'cart' => serialize(session()->get('cart'))
        ]);

        session()->forget('cart');
        return redirect()->route('product.index')->with('success', 'Your Order Confirm Correctely');
    }
    /************************************************************************************************************************** */




    /*******************************************For Admins Only******************* */
    /*********get all Orders */
    public function allOrders()
    {
        $allOrders = Order::paginate(10);
        $index = 0;
        $orderUsers = [];
        foreach ($allOrders as $item) {
            $index += 1;
            $userName = User::find($item->user_id)->name;
            $orderUsers[$index] = $userName;
        }
        /*$carts = $allOrders->transform(function ($cart, $key) {
            return unserialize($cart->cart);
        });*/
        return view('admin.order.allOrders', compact('allOrders', 'orderUsers'));
    }

    /*
     * show order Info
     */

    public function show($id)
    {
        $order = Order::find($id);
        $orderInfo = [];
        $userName = User::find($order->user_id)->name;
        $orderInfo = ([
            'id' => $order->id,
            'done' => $order->done,
            'userName' => $userName,
        ]);

        $cart = unserialize($order->cart);
        return view('admin.order.show', compact('cart', 'orderInfo'));
    }
    /**
     * Doing order
     */
    public function doingOrder($id)
    {
        $order = Order::find($id);
        $order->done = 1;
        $order->save();
        return redirect()->back();
    }

}
