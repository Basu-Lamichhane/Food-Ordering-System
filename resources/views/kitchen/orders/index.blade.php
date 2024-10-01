@extends('adminlte::page')

@section('title', 'Kitchen Orders')
@section('content')
<x-alert/>
 <div class="card">
    <div class="card-header">
        <h3 class="card-title" style="font-size:1.5em;font-weight: bold">Orders for Kitchen</h3>

    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>OrderID</th>
                    <th>Client</th>

                    <th>Order Status</th>

                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                <tr style="color:white; background-color:rgb(184, 184, 184);">
                    <td> #{{$order->id}}</td>
                    <td>{{$order->user->name}}</td>

                    <td>{{$order->status}}</td>

                    <td>

                        <a class="px-2" href="{{url('kitchen/orders/'.$order->id)}}"><i class="fa fa-eye"></i> Manage</a>

                    </td>



               </tr>
               @foreach ($order->products as $item)
        <tr class="">
            <td class="px-5 py-5   bg-white text-sm"><img width="60" src="{{asset("storage/".$item->media->path)}}"  alt="here"></td>
            <td class="px-2 py-5  bg-white text-sm">{{$item->name}}</td>
            <td class=" py-5   bg-white text-sm">{{$item->pivot->quantity}}</td>
            <td class="px-2 py-5 bg-white text-sm">{{$item->pivot->price}}</td>
        </tr>
        @endforeach
              @empty
                    <tr>

                       <td colspan="3"><span>No Orders Made Yet!</span></td>

                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
 </div>

@stop