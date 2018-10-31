<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    //Index
    public function index(){
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function confirm($id){
        //Finding Order
        $order = Order::find($id);

        //Updating Order
        $order->update([
            'status'=> 1
        ]);

        //Session Message
        session()->flash('msg', 'You just confirmed this order');

        //Redirect
        return redirect('/orders');

    }

    public function pending($id){
        //Finding order
        $order = Order::find($id);

        //Updating order
        $order->update([
            'status'=> 0
        ]);

        //Message
        session()->flash('msg', 'You have just changed the status of this order to pending');

        //Redirect
        return redirect('/orders');

    }

    public function show($id){
        $order = Order::find($id);
        return view('admin/orders/details', compact('order'));

    }
}
