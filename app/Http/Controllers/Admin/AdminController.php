<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Order;
use App\Models\Region;
use App\Models\RegionDelivery;
use App\Models\RegionUser;
use App\Models\User;
use App\Notifications\User\OrderPlaced as UserOrderPlaced;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {

        $orders = Order::all();
        $locorder[] = ['Region', 'Orders'];
        foreach ($orders as $key => $value) {
            $locorder[++$key] = [$value->city, (int)$value->where('city', $value->city)->count()];
        }
        return view('admin.index')->with('orders', $orders)->with('locorder', json_encode($locorder));
    }

    public function notify(Request $request)
    {
        $user_id = $request->input('user_id');
        $order_id = $request->input('order_id');
        $user = User::findorfail($user_id);
        $user->notify(new UserOrderPlaced($order_id, $user->name));
        return redirect()->back()->with('success', "$user->email Has Been Mailed");
    }
}
