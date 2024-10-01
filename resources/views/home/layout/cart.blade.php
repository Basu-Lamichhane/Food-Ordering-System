<div :class="cartOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'"
    class=" fixed right-0  top-0 max-w-xs w-full h-full px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-l-2 border-gray-300">
    <div class="flex items-center justify-between">
        <h3 class="text-2xl font-medium text-gray-700">Your cart</h3>

        <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none">
            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" stroke="currentColor">
                <path d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    <hr class="my-3">
@php
  //  $carts= collect();
@endphp
    <div id="cart-data">
        @if (session('cart'))
    @forelse (session()->get('cart') as $item)
   @php
       $product= App\Models\Product::find($item['product_id']);
   @endphp
    <div class="flex justify-between mt-6">
        <div class="flex">
            <img class="h-20 w-20 object-cover rounded" src="{{asset("storage/".$product->media->path)}}" alt="">
            <div class="mx-3">
                <h3 class="text-sm text-gray-600">{{$product->name}}</h3>
                <div class="flex items-center mt-2">
                    {{-- Add Quantity --}}
                    @csrf
                    <button value="{{ route('addItem',"$product->id") }}"  class="addItem text-gray-500 focus:outline-none focus:text-gray-600">
                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </button>
                    <span class="text-gray-700 mx-2">{{$item['quantity']}}</span>
                    {{-- Lower Quantity --}}
                    @if ($item['quantity']>1)
                    @csrf
                    <button value="{{ route('decreaseItem',"$product->id") }}" class="decreaseItem text-gray-500 focus:outline-none focus:text-gray-600 disabled" onclick="">
                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </button>
                    @endif

                    {{-- Remove Item --}}
                    @csrf
                    <button value="{{ route('deleteItem',"$product->id") }}" class="deleteItem text-gray-500 focus:outline-none focus:text-gray-600" onclick="">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-linecap="round" stroke="currentColor" stroke-width="2" fill="currentColor" class="h-5 w-5 mt-2 ml-1" viewBox="0 0 24 24">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                          </svg>
                    </button>
                </div>
            </div>
        </div>

        <span class="text-gray-600">{{$product->price}}</span>
    </div>

    @empty
    <div class="flex">
        No Items
    </div>
    @endforelse
    @else
    <div class="flex">
       Cart is Empty
    </div>
    @endif
    </div>




    @if (session('cart'))



    <a href="{{url('checkout')}}" class="flex items-center justify-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
        <span>Checkout</span>
        <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            viewBox="0 0 24 24" stroke="currentColor">
            <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
        </svg>
    </a>
    @endif

</div>
