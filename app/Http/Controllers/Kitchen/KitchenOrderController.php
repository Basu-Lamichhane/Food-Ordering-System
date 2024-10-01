<?php

namespace App\Http\Controllers\Kitchen;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Notifications\User\OrderProcessed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Else_;

class KitchenOrderController extends Controller
{

    // Kitchen Can change status from Pending->Processing and Processing->Processed


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('status', 'Pending')->orderBy('created_at', 'DESC')->get();
        return view('kitchen.orders.index')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if ($order->status == 'Processing' || $order->status == 'Pending' || $order->status == 'Processed') {
            return view('kitchen.orders.show')->with('order', $order);
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $status = $request->input('status');
        if ($order->status == 'Pending' && $status = 'Processing') {
            $order->status = $status;
            $order->save();
            return  Redirect::back()->with('success', 'Order is Started cooking');
        } else if ($order->status == 'Processing' && $status = 'Processed') {
            $order->status = $status;
            $order->save();
            $user = User::findorfail($order->user_id);
            $user->notify(new OrderProcessed($order->id, $user->name));
            return  Redirect::back()->with('success', 'Order is Cooked and Ready to be delivered cooking');
        } else {
            return  Redirect::back()->with('error', 'Invalid Status Change');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
