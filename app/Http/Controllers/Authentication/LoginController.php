<?php

namespace App\Http\Controllers\Authentication;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
    
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
                return redirect()->route('home.index'); // Forwarding to the home page.
            }
         
        }

        
        return back()->withErrors([
            'email' => 'البريد الإلكتروني أو كلمة السر غير صحيحة.',
        ]);
    }
}
