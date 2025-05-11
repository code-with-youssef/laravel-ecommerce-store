<?php

use Illuminate\Support\Facades\Route;

//Admin controllers.
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;

//Users authentication controllers.
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\LogoutController;
use App\Http\Controllers\Authentication\RegisterController;
use App\Http\Controllers\Authentication\ProfileController;

//Products-related controllers.
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;

//Helper pages controllers.
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\DashboardController;
//Services controllers.
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TheMostController;

//Admin middleware.
use App\Http\Middleware\AdminMiddleware;




// ---------------- Products-related Routes ----------------


Route::get('/', [CategoryController::class,'index'])->name("home.index");//For showing the home page.

Route::get('/products/{category?}', [ProductController::class, 'index'])->name("products.index");//Getting all the products of the category.

Route::get('/product/{product}', [ProductController::class, 'singleProduct'])->name("singleProduct.index");//Single product page to add it to cart.

Route::post('/review', [ReviewController::class,'store'])->name('review.store');//Creating a new review.


// ---------------- Users Authentication Routes ----------------


Route::get('/register', [RegisterController::class, 'index'])->name ("register.index");//Showing the register form.

Route::post('/register', [RegisterController::class, 'store'])->name("register");//Adding the user to database after validation.

Route::get('/profile', [ProfileController::class, 'index'])->name("profile.index");//showing the profile page of the user.

Route::get('/login/{product?}', [LoginController::class, 'index'])->name("login.index");//Showing the login form.

Route::post('/login', [LoginController::class, 'login'])->name("login");//Logging the user in.

Route::get('/logout', [LogoutController::class, 'logout'])->name("logout");//Logging the user out.


// ---------------- Order-related Routes ----------------


Route::get('/cart/{user}', [CartController::class, 'index'])->name("cart.index");//Creating cart for a user.

Route::resource('cart_item', CartItemController::class)->only(['store', 'update', 'destroy']);//Crud operations for the cartItems.

Route::get('/checkout/{userCart}', [CheckoutController::class, 'index'])->name("checkout.index");//Completing the order details.

Route::post('/payment/process', [PaymentController::class, 'paymentProcess'])->name("payment.process");//For the payment by visa through Paymob platform.

Route::post('/order/add', [OrderController::class, 'add'])->name("order.add");//Adding the order to the order table.

Route::get('/order/{user}', [OrderController::class, 'index'])->name("orders.index");//Showing the current orders for the user.


// ---------------- Features Routes ----------------


Route::get('/search', [SearchController::class, 'search'])->name("search");//Searching for a specific product.

Route::get('/theMost', [TheMostController::class, 'index'])->name("theMost.index");//Getting the bestseller and the most-searched products.

Route::get('/about', [AboutController::class, 'index'])->name("about");//Getting the bestseller and the most-searched products.



// ---------------- Admin Routes ----------------


Route::prefix('admin')->middleware(AdminMiddleware::class)->group(function (){


    Route::get('/adminDashboard',[DashboardController::class,'index'])->name('dashboard');
  
    Route::resource('adminProducts', AdminProductController::class)->parameters([
        'adminProducts' => 'product'
    ]);//CRUD operations of the products.

    Route::resource('adminCategories', AdminCategoryController::class)->parameters([
        'adminCategories' => 'category'
    ]);//CRUD operations of the categories.

    Route::resource('adminOrders', AdminOrderController::class)->parameters([
        'adminOrders' => 'order'
    ]);//CRUD operations of the orders.


    // ---------------- Admin Helper Routes ----------------


    Route::get('/search/categories', [AdminCategoryController::class, 'search'])->name("searchCategories");//Search for a category.

    Route::get('/search/products', [AdminProductController::class, 'search'])->name("searchProducts");//Search for a product.

    Route::get('/adminProduct/{category}', [AdminProductController::class, 'categoryProducts'])->name('adminProductsIndex');//Showing the category-related products

    Route::get('adminProducts/createProduct/{category}', [AdminProductController::class, 'createProduct'])
    ->name('createProduct');//Creating a new product for a specific category.


});




