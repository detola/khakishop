<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\User;

class DashboardController extends Controller
{
    public function index(){
        $products = new Product();
        $orders = new Order();
        $users = new User();

        return view('admin.dashboard', compact('products', 'orders', 'users', 'earnings'));
    }
}
