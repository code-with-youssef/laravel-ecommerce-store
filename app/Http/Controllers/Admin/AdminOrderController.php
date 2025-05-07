<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the orders.
     */
    public function index()
    {
        $orders=Order::all();
        return view('admin.orders.index',compact('orders')); //Passing all the orders to view.
    }

    /**
     * Show the form for creating a new order.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created order in storage.
     */
    public function store(Request $request, Order $order)
    {
        //
    }

    /**
     * Display the specified order.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified order.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified order in storage.
     */
    public function update(Request $request, Order $order)
    {
       // Updating the order status.
        $order->status=$request->status;
        $order->save();
        return redirect()->back()->with('message','تم تغيير حالة الطلب بنجاح');
    }

    /**
     * Remove the specified order from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
