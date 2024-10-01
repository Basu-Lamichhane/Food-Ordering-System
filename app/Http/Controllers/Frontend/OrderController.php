<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Notifications\User\OrderPlaced as UserOrderPlaced;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $orders = Order::where('user_id', auth()->user()->id)->orderByDesc('created_at')->get();
        return view('home.orders.index')->with('orders', $orders);
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

        $subtotal = 0;
        $cartdata = session()->get('cart');
        if (!$cartdata) {
            abort(404);
        }
        $order = new Order;
        foreach ($cartdata as $item) {
            $product = Product::find($item['product_id']);
            $subtotal = $subtotal + $item['quantity'] * $product->price;
        }
        if ($request->input("lat") != null) {
            $order->lat = $request->input("lat");
            $order->lng = $request->input("lng");
        }
        $order->subtotal = $subtotal;
        $order->user_id = auth()->user()->id;
        $order->payment_method = $request->input('payment_method') ?? 'Esewa';
        $order->phone = $request->input('phone');
        $discount = $request->input('discount');
        if ($discount) {

            $coupon = Coupon::where('code', $discount)->whereRaw('uses < max_uses')->first();
            if ($coupon == null) {
                return redirect()->route('checkout')->with('error', 'Promo Code invalid or maximum uses reached');
            }
            if (isset($coupon)) {
                $order->discount = $coupon->discount;
                $coupon->uses = $coupon->uses + 1;
                $coupon->update();
            } else {
                $order->discount = 0;
            }
        } else {
            $order->discount = 0;
        }

        $order->total =  $subtotal - ($order->discount / 100) * ($subtotal);
        $order->status = "Pending";
        $order->city = $request->input('city');
        $order->address_line = $request->input('address_line');
        $order->save();
        $user = User::findorfail($order->user_id);
        $user->notify(new UserOrderPlaced($order->id, $user->name));
        $orderProducts = [];
        foreach ($cartdata as  $item) {
            $product = Product::find($item['product_id']);
            $orderProducts[] = [
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $product->price,
            ];
        }
        $order_table = DB::table('order_product')->insert($orderProducts);
        $request->session()->forget('cart');
        return redirect()->route('orders.index');
    }

    /**
     * Store a newly created eSewa transaction in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function esewa_store(Request $request)
    {
        $cartdata = session()->get('cart');
        if (!$cartdata) {
            abort(404);
        }
        try {
            // Prepare payment data for eSewa
            $order = new Order();
            $order->user_id = auth()->user()->id;
            $order->subtotal = $request->input('total');
            $order->discount = 0; // Assuming no discount for this transaction
            $order->total = $request->input('total');
            $order->status = 'Pending';
            $order->phone = $request->input('phone');
            $order->city = $request->input('city');
            $order->lat = $request->input('lat');
            $order->lng = $request->input('lng');
            $order->address_line = $request->input('address_line');
            $order->payment_method = "Esewa-" . $request->input('transaction_uuid');

            // Save the order
            $order->save();

            $orderProducts = [];
            foreach ($cartdata as  $item) {
                $product = Product::find($item['product_id']);
                $orderProducts[] = [
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                ];
            }
            $order_table = DB::table('order_product')->insert($orderProducts);
            $request->session()->forget('cart');

            // Return a success response
            return response()->json([
                'message' => 'Order successfully created.',
                'order' => $order,
            ], 201); // 201 Created
        } catch (\Exception $e) {
            // Handle any exceptions that may occur
            return response()->json([
                'message' => 'Failed to create order.',
                'error' => $e->getMessage(),
            ], 500); // 500 Internal Server Error
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if ($order->user_id != auth()->user()->id) {
            abort(404);
        }
        $chats = Chat::where('order_id', $order->id)->get();
        return view('home.orders.show')->with('order', $order)->with('chats', $chats);
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
