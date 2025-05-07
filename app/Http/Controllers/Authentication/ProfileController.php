<?php

namespace App\Http\Controllers\Authentication;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
class ProfileController extends Controller
{
    function index(){
        return view('profile');// Viewing the profile page.
    }
}
