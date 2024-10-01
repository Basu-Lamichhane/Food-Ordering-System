@extends('adminlte::page')

@section('title', ' | View Order')

@section('content')
<x-alert />
<div class="card">
  <div class="card-header">
    <h3 class="card-title" style="font-size:1.5em;font-weight: bold">Viewing Order #{{$order->id}}</h3>
    <div class="card-tools">
      <div class="badge bg-success">Ordered On: {{\Carbon\Carbon::parse($order->created_at)->timezone('Asia/Kathmandu')->toDayDateTimeString() }}</div>
      </a>
    </div>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <tr>
        <td>Ordered By:</td>
        <td>{{$order->user->name}}</td>
      </tr>
      <tr>
        <td>Contact Info</td>
        <td>{{$order->phone}}</td>
      </tr>
      <tr>
        <td>Order Status</td>
        <td><span class="badge bg-{{\App\Services\VegOrDrink::status($order->status)}}">{{$order->status}}</span></td>
      </tr>
      <tr>
        <td>Payment</td>
        <td>{{$order->payment_method}}
          @if(strpos($order->payment_method, 'Esewa-') !== false )
          <span>
            @php
            $string = $order->payment_method;
            $parts = explode("Esewa-", $string);
            $trans_id = $parts[1];

            $subtotal = $order->subtotal;
            $amt = $subtotal + 30;
            @endphp

            <a href="https://uat.esewa.com.np/api/epay/transaction/status/?product_code=EPAYTEST&total_amount={{ $amt }}&transaction_uuid={{ $trans_id }}">
              Transaction Details
            </a>
          </span>
          @endif
        </td>
      </tr>
      <tr>
        <td>Subtotal</td>
        <td> NPR.{{$order->subtotal}}</td>
      </tr>
      <tr>
        <td>Discount</td>
        <td> {{$order->discount}} %</td>
      </tr>
      <tr>
        <td>Total</td>
        <td> NPR.{{$order->total}}</td>
      </tr>

    </table>
  </div>
</div>

<div class="card mt-2">
  <div class="card-header border-0">
    <h3 class="card-title">Products</h3>

  </div>
  <div class="card-body p-0">
    <table class="table table-striped table-valign-middle">
      <thead>
        <tr>

          <th>Product</th>
          <th>Quantity</th>
          <th>Price</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($order->products as $item)

        <tr>
          <td>
            <img src="{{asset("storage/".$item->media->path)}}" alt="{{$item->name}}" class="img-circle img-size-32 mr-2">
            {{$item->name}}
          </td>
          <td>{{$item->pivot->quantity}}</td>
          <td>
            <small class="text-success mr-1">
              {{$item->pivot->price}}
            </small>

          </td>

        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
</div>

@stop