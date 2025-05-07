<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));// Passing all the categories to the view.
    }

    /**
     * Show the form for creating a new .
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name'); // Set the name for the new category.

        // Handle image upload and store it in the correct path.
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img/categories'), $imageName);
            $category->imagepath = 'assets/img/categories/' . $imageName;
        }

        $category->save(); 
        return redirect()->route('adminCategories.index'); // Redirect to category listing page.
    }

    /**
     * Display the specified category.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $categories = Category::where('name', 'LIKE', '%' . $query . '%')->get(); // Search for categories by name.
        
        if ($categories->isEmpty()) {
            return view('admin.not-Found'); // No categories found.
        } else {
            return view('admin.categories.index', compact('categories')); // Categories found.
        }
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->name; 
        
        // Handle image upload and store the updated image.
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img/categories'), $imageName);
            $category->imagepath = 'assets/img/categories/' . $imageName;
        }

        $category->save(); 
        return redirect()->route('adminCategories.index'); // Redirect to category listing page.
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete(); // Delete the category from the database.
        return redirect()->back(); // Redirect back to the previous page.
    }
}
