@extends('home.layout.master')
@section('content')
<main class="my-8">
    <div class="container mx-auto px-6">


        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 flex justify-between  sm:px-6">
              <h3 class="text-lg leading-6 font-medium text-gray-900">
                Details of Order #{{$order->id}}
              </h3>
              <p class="mt-1 max-w-2xl text-sm text-gray-500">
               Order Information
              </p>
              <a class="bg-green-400 hover:bg-green-400 text-white p-2 rounded-md " href="#chatbox">Order Chat</a>
            </div>
            <div class="border-t border-gray-200">
              <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">
                    Ordered By
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{$order->user->name }}
                  </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">
                    Ordered on
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{\Carbon\Carbon::parse($order->created_at)->timezone('Asia/Kathmandu')->toDayDateTimeString() }}
                  </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">
                    Order Status
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <span class="relative inline-block font-semibold text-{{\App\Services\VegOrDrink::status($order->status)}}-900 leading-tight">
                        <span aria-hidden
                            class="absolute inset-0 bg-{{\App\Services\VegOrDrink::status($order->status)}}-200 opacity-50 rounded-full"></span>
                        <span class="relative px-3 py-1">{{$order->status }}</span>
                    </span>
                  </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">
                    Subtotal
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    NPR.{{$order->subtotal}}
                  </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">
                    Discounted
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{$order->discount}}%
                </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                      Total Price
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                      NPR.{{$order->total}}
                    </dd>
                  </div>
              </dl>
            </div>
          </div>

    <h3 class="text-gray-700 text-xl font-medium text-center mt-2">Products on Order</h3>
    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
        <div class=" inline-block min-w-full shadow rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Image
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Product
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Quantity
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Price
                        </th>
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
      <div id="chatbox">
        @include('home.partials.chatbox')
      </div>
    </div>
</main>

@endsection