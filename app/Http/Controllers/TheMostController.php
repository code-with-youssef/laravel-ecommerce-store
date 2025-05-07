<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Http\Request;

class TheMostController extends Controller
{
    public function index(){
        $soldProducts= DB::select('select * from products order by sales_count desc limit 3'); // Getting the top 3 sold products.
        $popularProducts= DB::select('select * from products order by search_count desc limit 3'); //Getting the top 3 searched products.

        return view('themost',compact('soldProducts','popularProducts')); // Passing these values to the view.
        
      
    }
}
