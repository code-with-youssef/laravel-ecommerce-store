<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    // Handles search requests
    public function search(Request $request){
        $query = $request->input('query');

        // Search products by name
        $products = Product::where('name', 'LIKE', '%' . $query . '%')->get();

        // Show not-found view if no results
        if($products->isEmpty()){
            return view('not-Found');
        } 
        // Otherwise, show matching products
        else {
            return view('products', compact('products'));
        }
    }
}
