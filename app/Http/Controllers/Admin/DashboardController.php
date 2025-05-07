<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $users_count=User::count();

        $orders_count=Order::count();

        $waiting_orders_count=Order::where('status','جاري التوصيل')->count();// The count of waiting orders only.

        $revenues = number_format(
            Order::where('status', 'تم التوصيل')->sum('total_amount')
        );// Calculate revenue from delivered orders only

        return view('admin.dashboard',compact('orders_count','revenues','waiting_orders_count','users_count'));// Passing these data to the dashboard for showing.
      
    }
}
