<div class="my-4">

    @if($sectiondata->where('id',$sectionid)->count() ==1)
    @php
        $sectionlist= $sectiondata->where('id',$sectionid)->first();
    @endphp
    <h3 class="text-gray-700 text-2xl font-medium">{{$sectionlist->name}}</h3>
    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3  mt-6">
    @forelse ($sectionlist->products as $item)
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
                <h3 class=" uppercase">{{ $item->name }}  </h3>

                  <img src="{{ App\Services\VegOrDrink::img($item->isVeg,$item->isDrink)}}" width="20px" class="float-right" alt="" srcset="">
            </a>

                   @if ($item->reviews()->average('rating')!=0)
                   <h4 class="text-yellow-500">
                    <b>
                   {{$item->reviews()->average('rating')}}
                </b> <i class="fa fa-star"></i> </h4>
                   @endif

            <span class="text-gray-500 mt-2">NPR. {{ $item->price }}</span>
        </div>
    </div>
    @empty
    <div>
        Empty
    </div>
    @endforelse
    </div>
    @endif
</div>