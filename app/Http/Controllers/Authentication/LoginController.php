<?php

namespace App\Http\Controllers\Authentication;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Product $product)
    {
        return view("auth.login",compact('product'));
    }

    public function login(Request $request)
    {
        $product_id = $request->product_id; 
        $product = Product::where('id',$product_id)->first(); // Getting the product if the user logged in from the product page.

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);// Validating the type of the input data.

        $credentials = $request->only('email', 'password');

        // Searching for the credentials of the user in the database
        if (Auth::attempt($credentials)) {

            if(Auth::user()->is_admin) {

                return redirect()->route('dashboard');// Forwarding to the admin dashboard.
            }

         
            else{
                if ($product === null) {
                    return redirect()->route('home.index');
                }

                else{
                    return redirect()->route('singleProduct.index',$product); // Returning the user back to the product page.
                }
                
            }
         
        }

        
        return back()->withErrors([
            'email' => 'البريد الإلكتروني أو كلمة السر غير صحيحة.',
        ]);
    }
}
