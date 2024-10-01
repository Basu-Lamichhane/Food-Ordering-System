<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\HandleDelivery;
use App\Models\Order;
use App\Models\User;
use App\Models\Reviewable;
use App\Notifications\User\OrderDelivered;
use App\Notifications\User\OrderHandled;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location = auth()->user()->regionName();
        $orders = Order::where('city', $location)->where('status', 'Processed')->orWhere('status', 'Delivering')->get();
        return view('delivery.orders.index')->with('orders', $orders)->with('location', $location);
    }
    public function handle(Request $request)
    {
        $order_id = $request->input('order_id');
        $order_status = $request->input('status');

        $order = Order::findorfail($order_id);
        if ($order->status != "Processing" && auth()->user()->role != '3') {
            return redirect()->back()->with('error', 'Order cannot be handled or not ready for delivering');
        } else {
            if ($order_status != "Delivering") {
                return redirect()->back()->with('error', 'Invalid Order Status');
            } else {
                $handle = new HandleDelivery;
                $handle->user_id = auth()->user()->id;
                $handle->order_id = $order_id;
                $handle->save();
                $order->status = $order_status;
                $order->update();
                $user = User::findorfail($order->user_id);
                $user->notify(new OrderHandled($order->id));
                return redirect()->back()->with('success', 'Order Handled');
            }
        }
    }
    public function handled(Request $request)
    {
        $order_status = $request->input('status');
        $order_id = $request->input('order_id');
        $handle = HandleDelivery::where('order_id', $order_id)->first();
        $user = User::findorfail($handle->user_id);
        if (!$handle) {
            return redirect()->back()->with('error', "Order is not Handled Yet");
        } else {
            if (auth()->user()->id != $handle->user_id) {
                return redirect()->back()->with('error', "Order is Handled by $user->name");
            } else {
                if ($order_status != "Delivered") {
                    return redirect()->back()->with('error', "Invalid Order Status");
                } else {
                    $order = Order::findorfail($order_id);
                    $order->status = $order_status;
                    $order->update();
                    $uhandle = HandleDelivery::findorfail($handle->id);
                    $uhandle->update();
                    $user = User::findorfail($order->user_id);
                    $user->notify(new OrderDelivered($order->id, $uhandle->updated_at));
                    return redirect()->back()->with('success', "Order is delivered");
                }
            }
        }
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
        if ($order->status == 'Processed' || $order->status == 'Delivering' || $order->status == 'Delivered') {
            return view('delivery.orders.show')->with('order', $order);
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
        //
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
