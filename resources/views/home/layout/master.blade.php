<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="manifest" href="{{asset('manifest.webmanifest')}}" crossorigin="use-credentials">
    <link rel="icon" href="{{ asset('img/fos.png') }}" type="image/png" >

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>



    <style type="text/css">
      #map {
        width: 100%;
        height: 280px;
      }
    </style>
    @yield('styles')
    @yield('scripts')
    <title>Food Ordering System</title>
</head>
<body id="main-body">

    {{-- <div class="bg-yellow-400">
        <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
          <div class="flex items-center justify-between flex-wrap">
            <div class="w-0 flex-1 flex items-center">
              <span class="flex p-2 rounded-lg bg-indigo-800">
                <!-- Heroicon name: outline/speakerphone -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                </svg>
              </span>
              <p class="ml-3 font-medium text-white truncate">
                <span class="md:hidden">
                  We announced a new product!
                </span>
                <span class="hidden md:inline">
                  Big news! We're excited to announce a brand new product.
                </span>
              </p>
            </div>
            <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
              <a href="#" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-indigo-600 bg-white hover:bg-indigo-50">
                Learn more
              </a>
            </div>
            <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
              <button type="button" class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
                <span class="sr-only">Dismiss</span>
                <!-- Heroicon name: outline/x -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
          </div>
        </div>

    </div> --}}
    @php
       $carts=collect(session()->get('cart'));
    @endphp
<div id="window"  x-data="{ cartOpen: false , isOpen: false }" class="bg-white">
    <header>
        <div class="container mx-auto px-6 py-3">

            <div class="flex items-center justify-between">
                <div class="hidden w-full text-gray-600 md:flex md:items-center">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.2721 10.2721C16.2721 12.4813 14.4813 14.2721 12.2721 14.2721C10.063 14.2721 8.27214 12.4813 8.27214 10.2721C8.27214 8.06298 10.063 6.27212 12.2721 6.27212C14.4813 6.27212 16.2721 8.06298 16.2721 10.2721ZM14.2721 10.2721C14.2721 11.3767 13.3767 12.2721 12.2721 12.2721C11.1676 12.2721 10.2721 11.3767 10.2721 10.2721C10.2721 9.16755 11.1676 8.27212 12.2721 8.27212C13.3767 8.27212 14.2721 9.16755 14.2721 10.2721Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M5.79417 16.5183C2.19424 13.0909 2.05438 7.39409 5.48178 3.79417C8.90918 0.194243 14.6059 0.054383 18.2059 3.48178C21.8058 6.90918 21.9457 12.6059 18.5183 16.2059L12.3124 22.7241L5.79417 16.5183ZM17.0698 14.8268L12.243 19.8965L7.17324 15.0698C4.3733 12.404 4.26452 7.97318 6.93028 5.17324C9.59603 2.3733 14.0268 2.26452 16.8268 4.93028C19.6267 7.59603 19.7355 12.0268 17.0698 14.8268Z" fill="currentColor" />
                    </svg>
                    <span class="mx-1 text-sm">Chitwan</span>
                </div>
                <div class="w-full text-gray-700 md:text-center text-2xl font-semibold">
                  <img src=" {{ asset('img/site-title.png') }}" alt="">
                </div>

                <div class="flex items-center justify-end w-full">

                    <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none mx-4 sm:mx-0">
                        <span class="relative inline-block">
                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                       @if (count($carts)>0)
                       <span class="h-3 w-3 absolute top-0 right-0 inline-flex items-center justify-center px-2 py-2 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-md">{{count($carts)}}</span>
                       @else

                       @endif


                    </span>
                    </button>

                    <div class="flex sm:hidden">
                        <button @click="isOpen = !isOpen" type="button" class="text-blue-600 hover:text-gray-500 focus:outline-none focus:text-gray-500" aria-label="toggle menu">
                            <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                                <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

            </div>
            <nav :class="isOpen ? '' : 'hidden'" class="sm:flex sm:justify-center sm:items-center mt-4">
                <div class="flex flex-col sm:flex-row">

                    <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="{{url('/drinks')}}">Drinks</a>
                    <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="{{url('/veggie')}}">Veggie</a>
                    @guest
                    <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="{{route('login')}}">Login</a>
                    <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="{{route('register')}}">Register</a>
                    @endguest
                    @auth
                    <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="{{url('/dashboard')}}">{{Auth::user()->name}}</a>
                    <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="{{ route('logout') }}" >Logout</a>
                    @endauth
                </div>
            </nav>
            <div class="relative mt-6 max-w-lg mx-auto">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                    <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </span>
                <form action="{{route('search')}}" method="get">

                    <input name="query" class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline" value="{{isset($query)? $query: ''}}" type="text" placeholder="Search" required>

                </form>
            </div>
        </div>
    </header>
   @include('home.layout.cart')
   @yield('content')

   @include('home.layout.bottom-nav')
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>

//Add to cart
$(document).on('click', '.addtocart',function (event){

  event.preventDefault();
  $.ajax({
    type: "POST",
    url: $(this).attr('value'),
    data: {
        "_token": "{{ csrf_token() }}",
        },
    success: function (data) {
      console.log(data);
      $('body').load('');
    },
    error: function (data) {
      console.log('Error:', data);
    }
  });

});

//endaddtocart

//Delete Cart Item
$(document).on('click','.deleteItem', function (event){

event.preventDefault();
$.ajax({
  type: "POST",
  url: $(this).attr('value'),
  data: {
        "_token": "{{ csrf_token() }}",
        },
  success: function (data) {
    console.log(data);
    $('#main-body').load('');
  },
  error: function (data) {
    console.log('Error:', data);
  }
});

});

//AddItemToCart
$(document).on('click','.addItem', function (event){

event.preventDefault();
$.ajax({
  type: "POST",
  url: $(this).attr('value'),
  data: {
        "_token": "{{ csrf_token() }}",
        },
  success: function (data) {
    console.log(data);
    $('#main-body').load('');
  },
  error: function (data) {
    console.log('Error:', data);
  }
});

});
//AddItemToCart
$(document).on('click','.decreaseItem', function (event){

event.preventDefault();
$.ajax({
  type: "POST",
  url: $(this).attr('value'),
  data: {
        "_token": "{{ csrf_token() }}",
        },
  success: function (data) {
    console.log(data);
    $('#main-body').load('');

  },
  error: function (data) {
    console.log('Error:', data);
  }
});

});

</script>


</body>
</html>