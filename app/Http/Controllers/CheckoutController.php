<?php

namespace App\Http\Controllers;
use App\Models\Cart;


use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Cart $userCart){

        $total = $userCart->cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        }); //Finding the total price for the cart items

        return view('checkout',compact('userCart','total')); // Passing the cart and the total for the checkout page.

    }

  
}
