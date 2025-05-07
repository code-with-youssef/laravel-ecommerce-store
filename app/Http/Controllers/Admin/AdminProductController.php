<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
   /**
     * Display a listing of the products.
     */
    public function categoryProducts(Category $category)
    {
        $products = Product::where('category_id',$category->id)->get();
        return view('admin.products.index',compact('products','category'));// Passing all the products in the given category to the view.
    }

    /**
     * Show the form for creating a new product.
     */
    public function createProduct(Category $category)
    {
        return view('admin.products.create',compact('category'));// Display the form to create a new product in the given category.
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        //Creating the new product with the values comes with the request
        $product = new Product();
        
        $category = Category::where('id', $request->category_id)->first(); //Finding the suitable category for the product.
        $product->category_id = $request->category_id;

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        
        // Handle image upload and store it in the correct path.
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img/products'), $imageName);
            $product->imagepath = 'assets/img/products/' . $imageName;
        }

        $product->save(); 
        return redirect()->route('adminProductsIndex', $category); // Redirect to the product listing page for the given category.
    }

    /**
     * Display the specified product.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $categoryId = $request->input('category');
     
        $products = Product::where('name', 'LIKE', '%' . $query . '%')
            ->where('category_id', $categoryId)
            ->get(); // Search for products by name and category.

        $category = Category::find($categoryId);

        if (!$category) {
            return redirect()->back()->with('error', 'لم يتم العثور على التصنيف.'); // Category was not found.
        }

        if ($products->isEmpty()) {
            return view('admin.not-Found'); // Product was not found.
        }

        return view('admin.products.index', compact('products', 'category')); // Display the products found.
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        $categories = Category::all(); 
        return view('admin.products.edit', compact('product','categories')); // Show the form to edit the product.
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category;

        // Handle image upload and update the image.
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img/products'), $imageName);
            $product->imagepath = 'assets/img/products/' . $imageName;
        }

        $product->save(); 
        return redirect()->route('adminProductsIndex', $product->category); // Redirect back to the product listing page for the product's category.
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete(); 
        return redirect()->back(); // Redirect back to the previous page.
    }
}
