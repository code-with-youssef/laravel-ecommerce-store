<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource. (Not used currently)
     */
    public function index(){
        //
    }

    /**
     * Store a newly added product to the user's cart.
     */
    public function store(Request $request)
    {
        $user = User::where('id', $request->input('user_id'))->first(); // Find the user by ID.

        // Create a cart for the user if one doesn't exist.
        if (!$user->cart) {
            $userCart = Cart::firstOrCreate(['user_id' => $request->user_id]);
            $cart_id = $userCart->id;
        } else {
            $cart_id = $request->input('cart_id'); // Use existing cart ID from the request.
        }

        // Get product and quantity details from the request.
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        $product_quantity = $request->input('product_quantity'); // Total available product quantity.

        // Check if the product already exists in the user's cart.
        $existingItem = CartItem::where('cart_id', $cart_id)
                                ->where('product_id', $product_id)
                                ->first();

        if ($existingItem) {
            // If adding more doesn't exceed available stock, update the quantity.
            if ($existingItem->quantity + $quantity <= $product_quantity) {
                $existingItem->quantity += $quantity;
                $existingItem->save();
            } else {
                // If adding exceeds available stock, cap it and show a message.
                $existingItem->quantity = $product_quantity;
                return redirect()->back()->with('failed', 'لديك أقصي كمية متوفرة من هذا المنتج في العربة الان');
            }
        } else {
            // If product doesn't exist in cart, create a new cart item.
            CartItem::create([
                'cart_id' => $cart_id,
                'product_id' => $product_id,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->back()->with('success', 'تمت اضافة المنتج الي العربة'); // Redirect back with success message.
    }

    /**
     * Remove the specified item from the cart.
     */
    public function destroy($item_id)
    {
        CartItem::find($item_id)->delete(); // Delete the cart item by ID.
        return redirect()->back(); // Redirect back to the cart page.
    }

    /**
     * Update the specified cart item (decrease quantity or remove if 1).
     */
    public function update($item_id)
    {
        $cartItem = CartItem::find($item_id); // Find the cart item.

        if ($cartItem->quantity > 1) {
            $cartItem->quantity -= 1; // Decrease quantity by 1 if greater than 1.
            $cartItem->save();
        } else {
            $cartItem->delete(); // If quantity is 1, remove the item from the cart.
        }

        return redirect()->back(); // Redirect back to the cart page.
    }
}
