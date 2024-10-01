@extends('home.layout.master')
@section('content')
<main class="my-8">
    <div class="container mx-auto px-6">
        <div class="md:flex md:items-center">
            <div class="w-full h-64 md:w-1/2 lg:h-96">
                <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto"
                    src="{{ asset("storage/".$product->media->path) }}"
                    alt="{{ $product->name }}">
            </div>
            <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
                <h3 class="text-gray-700 uppercase text-lg">{{ $product->name }}</h3>
                <span class="text-gray-500 mt-3">NPR.{{ $product->price }}</span>
                <hr class="my-3">
                <div class="mt-3">
                    <label class="text-gray-700 text-sm" for="count">Product Type:</label>
                    <div class="flex items-center mt-1">
                        <i
                            class=" mr-2 fa {{ App\Services\VegOrDrink::icon($product->isVeg,$product->isDrink) }} "></i>
                        <span class="rounded-md bg-yellow-300 p-1 mr-2 ">{{ $product->category->name }}</span>
                    </div>

                    @if($product->onStock)
                        <div class="flex items-center mt-1 text-green-600">
                            Product is Available
                        </div>
                    @else
                        <div class="flex items-center mt-1 text-red-600">
                            Product is not Available
                        </div>
                    @endif

                </div>
                @if($product->onStock)
                        <div class="flex items-center mt-6">
                    @if(session('cart'))
                        @php
                            $cart= session()->get('cart');
                        @endphp
                        @if(isset($cart[$product->id]))

                            <button class=" text-gray-600 border rounded-md p-2 hover:bg-gray-200 focus:outline-none">
                                Added to Cart
                            </button>
                        @else
                            <button href="#!"
                                value="{{ route('addtocart',"$product->id") }}"
                                class="addtocart  text-gray-600 border rounded-md p-2 hover:bg-gray-200 focus:outline-none">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </button>
                        @endif

                    @else
                        <button href="#!"
                            value="{{ route('addtocart',"$product->id") }}"
                            class="addtocart text-gray-600 border rounded-md p-2 hover:bg-gray-200 focus:outline-none">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </button>
                    @endif


                </div>
                @endif
                
            </div>
        </div>
        <div class="mt-16 mb-16">
            <h3 class="text-gray-600 text-2xl font-medium">Similar Products</h3>
            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">

                @forelse($similars as $item)
                    <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                        <div class="flex items-end justify-end h-56 w-full bg-cover"
                            style=" background-image: url('{{ asset("storage/".$item->media->path) }}')">
                            @csrf
                            <a href="#!"
                                value="{{ route('addtocart',"$item->id") }}"
                                class="addtocart p-2 rounded-full bg-yellow-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </a>
                        </div>

                        <div class="px-5 py-3">

                            <a class="text-gray-700 hover:text-yellow-500" title="View Product"
                                href="{{ url('/product/'.$item->id) }}">
                                <h3 class=" uppercase">{{ $item->name }}</h3>
                            </a>
                            <span class="text-gray-500 mt-2">NPR. {{ $item->price }}</span>
                        </div>
                    </div>
                @empty

                @endforelse





            </div>
        </div>
    </div>
    @endsection
