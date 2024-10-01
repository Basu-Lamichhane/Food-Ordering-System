@extends('home.layout.master')
@section('content')


<main class="my-8">
    <div class="container mx-auto px-6">
        <h3 class="text-gray-700 text-2xl font-medium">My Orders</h3>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class=" inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Order
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                To Pay
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Location
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                        <tr class="border-t border-gray-200">
                            <td class="px-5 py-5 bg-white text-sm">
                                <div class="flex items-center">

                                    <a href="{{url('orders/'.$order->id)}}"> <b>Order_#{{$order->id}}</b></a>
                                </div>
                            </td>
                            <td class="px-5 py-5  bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap"> NPR. {{$order->total}} ({{$order->payment_method}})</p>
                            </td>
                            <td class="px-5 py-5  bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $order->city }},{{$order->address_line }}
                                </p>
                            </td>
                            <td class="px-5 py-5  bg-white text-sm">
                                <span class="relative inline-block px-3 py-1 font-semibold text-{{\App\Services\VegOrDrink::status($order->status)}}-900 leading-tight">
                                    <span aria-hidden
                                        class="absolute inset-0 bg-{{\App\Services\VegOrDrink::status($order->status)}}-200 opacity-50 rounded-full"></span>
                                    <span class="relative">{{$order->status }}</span>
                                </span>
                            </td>
                        </tr>
                        <div class="">
                            @foreach ($order->products as $item)
                            <tr class="">
                                <td class="px-5 py-5   bg-white text-sm"><img width="60" src="{{asset("storage/".$item->media->path)}}" alt="here"></td>
                                <td class="px-2 py-5  bg-white text-sm">{{$item->name}}</td>
                                <td class=" py-5   bg-white text-sm">{{$item->pivot->quantity}}</td>
                                <td class="px-2 py-5 bg-white text-sm">{{$item->pivot->price}}</td>
                            </tr>
                            @endforeach
                        </div>
                        <tr>
                            <td colspan="4" class="text-center px-3 py-5 "><a class="bg-yellow-400 p-2 rounded-md hover:bg-yellow-300" href="{{url('orders/'.$order->id)}}">View Order</a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class=" mx-3 text-center">You have made no Orders</td>
                        </tr>
                        @endforelse



                    </tbody>
                </table>
                {{-- <div
                class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
                PAGINATION
            </div> --}}
            </div>
        </div>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.addtocart').click(function(event) {

        event.preventDefault();
        $.ajax({
            type: "POST",
            url: $(this).attr('value'),

            success: function(data) {
                console.log(data);
                $('#cart-data').load('? #cart-data');
            },
            error: function(data) {
                console.log('Error:', data);
            }
        });
    });
</script>
@endsection