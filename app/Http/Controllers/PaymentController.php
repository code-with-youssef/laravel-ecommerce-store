<?php

namespace App\Http\Controllers;

use App\Services\PaymobService;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $paymentService;

    // Injecting the Paymob service
    public function __construct(PaymobService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    // Starts the payment process and redirects to the payment link
    public function paymentProcess(Request $request)
    {
        $user_id = $request->input('user_id');

        // Create payment link using Paymob service
        $paymentlink = $this->paymentService->createPaymentLink(
            $request->amount,
            $request->first_name,
            $request->last_name,
            $request->email,
            $request->phone,
            $request->city,
            $user_id,
        );

        return redirect()->away($paymentlink);
    }

    // Handles Paymob webhook after payment is completed
    public function paymentWebhook(Request $request)
    {
        $data = $request->all();
        Log::info('Webhook triggered');

        $user_id = $data['obj']['payment_key_claims']['extra']['userId'];
        $orderData = $data['obj']['order'];
        $shipping = $orderData['shipping_data'];

        // Create order record
        Order::create([
            'order_id'         => $orderData['id'],
            'user_id'          => $user_id,
            'first_name'       => $shipping['first_name'],
            'last_name'        => $shipping['last_name'],
            'total_amount'     => $data['obj']['amount_cents'] / 100,
            'payment_method'   => 'credit_card',
            'city'             => $shipping['city'],
            'address'          => $shipping['street'] . ', ' . $shipping['building'],
            'phone'            => $shipping['phone_number'],
            'email'            => $shipping['email'],
        ]);

        $user = User::find($user_id);
        $cart = $user->cart;
        $order = Order::latest()->first();
        $orderContent = [];

        // Process each cart item
        foreach ($cart->cartItems as $item) {
            $product = $item->product;
            $product->sales_count += 1;

            $orderContent[] = [
                'product_name' => $item->product->name,
                'quantity' => $item->quantity,
            ];

            // Reduce product stock
            if ($product && $product->quantity >= $item->quantity) {
                $product->quantity -= $item->quantity;
                $product->save();
            }

            $order->content = $orderContent;
            $order->save();
        }

        // Clear the user's cart
        $cart->cartItems()->delete();

        return response()->json(['status' => 'received']);
    }

    // Shows thank you page after successful payment
    public function PaymentDone()
    {
        return view('Thankyou');
    }
}
