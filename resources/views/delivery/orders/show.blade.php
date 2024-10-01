@extends('adminlte::page')

@section('title', 'Handle Order')
@section('content')

<x-alert/>
<div class="card">

    @php
       echo "Time is: ".date("h:i:sa") ;
    @endphp
    <div class="card-header">
      <h3 class="card-title">
        <i class="fa fa-tools"></i>
        Handle Order #{{$order->id}}
      </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <dl>
        <dt>Client Name</dt>
        <dd>{{$order->user->name}}</dd>
        <dt>Client phone</dt>
        <dd>{{$order->phone}}</dd>
        <dt>Order Status</dt>
        <dd>{{$order->status}}</dd>
        <dd>Via. {{$order->payment_method}}</dd>
        <dt>Pays </dt>
        <dd>NPR. {{$order->total}}</dd>
        <dd>Discount: {{$order->discount}}%</dd>
        <dt>Delivery Location: </dt>
        <dd>  <a  style="cursor: pointer;" onclick="myNavFunc()" class="btn info-box-icon bg-success"><i class="fas fa-map"></i>Take me there!</a>
        </dd>
        <dd> {{$order->city}}, {{$order->address_line}}</dd>
      </dl>
    </div>
    <!-- /.card-body -->
  </div>
  <div class="card">
      <div class="card-body">
          <div class="d-flex justify-content-around">
                
            @if ($order->status== 'Processed')
            <form action="{{route('delivery.orders.handle')}}" method="post">
                @csrf
                <input type="hidden" name="status" value="Delivering">
                <input type="hidden" name="order_id" value="{{$order->id}}">
                <button type="submit" class="btn info-box-icon bg-info"><i class="fas fa-cog"></i> Handle Delivery </button>
            </form>
            @else
            <button disabled class="btn info-box-icon bg-info"><i class="fas fa-cog"></i> Delivery Handled </button>
            @endif
                
            @if ($order->status== 'Delivering')      
            <form action="{{route('delivery.orders.handled')}}" method="post">
                @csrf
                <input type="hidden" name="status" value="Delivered">
                <input type="hidden" name="order_id" value="{{$order->id}}">
                    <button type="submit" class="btn info-box-icon bg-success"><i class="fas fa-check"></i> Delivered </button>
                </form>
           @else 
           <button disabled class="btn info-box-icon bg-success"><i class="fas fa-check"></i> Delivered </button>
           @endif
                
           
          </div>
      </div>
  </div>
  <div class="row mt-3 p-2">
                        
  

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
function myNavFunc(){
    let lat = <?php echo $order->lat?> ;
    let lng = <?php echo $order->lng?>; 
// If it's an iPhone..
if( (navigator.platform.indexOf("iPhone") != -1) 
    || (navigator.platform.indexOf("iPod") != -1)
    || (navigator.platform.indexOf("iPad") != -1))
     window.open("maps://www.google.com/maps/dir/?api=1&travelmode=driving&layer=traffic&destination="+lat+","+lng);
else
     window.open("https://www.google.com/maps/dir/?api=1&travelmode=driving&layer=traffic&destination="+lat+","+lng);
}
</script>
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


