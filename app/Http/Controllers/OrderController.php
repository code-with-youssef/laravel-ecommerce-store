<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index(User $currentUser) {
            return view('orders', compact('currentUser'));

    }

    public function add(Request $request)
    {
        $orderId = mt_rand(100000000, 999999999); // Generating a random order Id
        $user_id=$request->input('user_id'); // Getting the user_id form the request
        // Creating the new order.
        Order::create([
            'order_id'        => $orderId,
            'user_id'         => $user_id,
            'first_name'      => $request->input('first_name'),
            'last_name'       => $request->input('last_name'),
            'total_amount'    => $request->input('amount'),
            'payment_method'  => $request->input('payment_method'),
            'city'            => $request->input('city'),
            'address'         => $request->input('address'),
            'phone'           => $request->input('phone'),
            'email'           => $request->input('email'),
        ]);
        $user = User::find($user_id);
        $cart = $user -> cart;
        $order = Order::latest()->first();
        $orderContent = [];
       

        foreach ($cart->cartItems as $item) {
            $product = $item->product;
            $product->sales_count+=1;// Increasing the sales_count.

            $orderContent[] = [
                'product_name' => $item->product->name,
                'quantity' => $item->quantity,
            ];
            $order->content = $orderContent; // Filling the product content.

            // Decreasing the product quantity in the database.
            if ($product && $product->quantity >= $item->quantity) {
                $product->quantity -= $item->quantity;
                $product->save();
            }

            $order->save();

        }
        $cart->cartItems()->delete();// Deleting the items form the cart after the order.



        return view('Thankyou'); //Viewing thank you page.
    }


}
