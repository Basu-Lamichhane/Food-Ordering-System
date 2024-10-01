@extends('adminlte::page')

@section('title', 'Handle Order')
@section('content')
<x-alert/>
<div class="card">
    <div class="card-header">
      <h3 class="card-title">
        <i class="fas fa-text-width"></i>
        Handle Order #{{$order->id}}
      </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <dl>
        <dt>Client Name</dt>
        <dd>{{$order->user->name}}</dd>
        <dt>Order Status</dt>
        <dd>{{$order->status}}</dd>
        <dd>Via. {{$order->payment_method}}</dd>
        <dt>Pays </dt>
        <dd>NPR. {{$order->total}}</dd>
      </dl>
    </div>
    <!-- /.card-body -->
  </div>
  <div class="card">
      <div class="card-body">
          <div class="d-flex justify-content-around">
                
            @if ($order->status== 'Pending')
            <form action="{{route('kitchen.orders.update',$order->id)}}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="Processing">
                <button type="submit" class="btn info-box-icon bg-info"><i class="fas fa-cog"></i> Start Cooking </button>
            </form>
            @else
            <button disabled class="btn info-box-icon bg-info"><i class="fas fa-cog"></i> Start Cooking </button>
            @endif
                
            @if ($order->status== 'Processing')      
                <form action="{{route('kitchen.orders.update',$order->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="Processed">
                    <button type="submit" class="btn info-box-icon bg-success"><i class="fas fa-check"></i> Finished Cooking </button>
                </form>
           @else 
           <button disabled class="btn info-box-icon bg-success"><i class="fas fa-check"></i> Finished Cooking </button>
           @endif
                
           
          </div>
      </div>
  </div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="font-size:1.5em;font-weight: bold">Products on Order</h3>
        
    </div>
    
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                
                
               @foreach ($order->products as $item)
        <tr class="">
            <td class="px-5 py-5   bg-white text-sm"><img width="60" src="{{asset("storage/".$item->media->path)}}"  alt="here"></td>
            <td class="px-2 py-5  bg-white text-sm">{{$item->name}}</td>
            <td class=" py-5   bg-white text-sm">{{$item->pivot->quantity}}</td>
            <td class="px-2 py-5 bg-white text-sm">{{$item->pivot->price}}</td>
        </tr>
        @endforeach
    
            </tbody>
        </table>

    </div>
</div>

@stop


