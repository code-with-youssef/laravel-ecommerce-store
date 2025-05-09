<?php

namespace App\Http\Controllers\Authentication;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.signup');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request-> validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',// The email must be unique in the users table.
                'password' => 'required|confirmed|min:8|regex:/[a-z]/|regex:/[A-Z]/',
                
            ], [
                'email.unique' => 'email already exits',
                'password.min' => 'password must be at least 8 charcters',
                'password.regex' => 'password must conatain atleast one upper case and one lower case.',
                'password.confirmed' => 'Password does not match',
            ]
            );// Making the specific constraints for the password and email.

        // Creating the user after validation process.
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'imagepath' => 'assets/img/profile.png',

        ]);

        return redirect()->route('login.index');

    }
}
