<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index()
    {
       $orders= Order::all();
        return view('delivery.index')->with('orders',$orders);
    }
    
}
