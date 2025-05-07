<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Category;

class ProductController extends Controller
{
   
    public function index(Category $category = null)
    {
        if ($category) 
        {
            
            $products = $category->products; //Getting the specified category products.
        } 
        else 
        {
            $products = Product::all(); //Getting all the product.
        }
       
    
        return view('products', compact('products'));
       
    }

    public function singleProduct(Product $product)
    {
        $product->search_count +=1; // Increasing the search count by one at every visit.
        $product->save();
        return view('singleproduct', compact('product')); //Passing the product to the page.
       
    }


}
