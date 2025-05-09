<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(User $user)
    {
        // Creating a cart for the user if one doesn't already exist.
        if(!$user->cart){
            $userCart = Cart::firstOrCreate(['user_id' => $user->id]);
        }
        else{
            $userCart=$user->cart;// Use the existing cart
        }
    
        return view('cart', compact('userCart'));// Passing  the cart to the cart page.
    }

}
