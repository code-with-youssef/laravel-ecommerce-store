<?php

namespace App\Http\Controllers;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('categories', compact('categories')); //Passing all the categories to the home page.

    }

}
