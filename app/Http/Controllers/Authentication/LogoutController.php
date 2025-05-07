<?php

namespace App\Http\Controllers\Authentication;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    
    public function logout(){

        Auth::logout();// Logging the user out.
        return redirect()->route('home.index');// Returning to the home page.
    }
}
