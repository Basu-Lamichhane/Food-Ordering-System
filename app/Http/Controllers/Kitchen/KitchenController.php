<?php

namespace App\Http\Controllers\Kitchen;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class KitchenController extends Controller
{
    public function index()
    {
       // $orders = Order::orderBy('created_at', 'DESC')->where('status', 'Pending')->orWhere('status', 'Processing')->get();
        $orders = Order::with('user')  // Assuming there is a 'user' relationship in the Order model
            ->whereIn('status', ['Pending', 'Processing']) // Use whereIn for better readability
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('kitchen.index')->with('orders', $orders);
    }
}
