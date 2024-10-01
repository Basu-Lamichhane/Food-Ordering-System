@extends('home.layout.master')
@section('content')
<style>
  .rating label input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}


.rating:not(:hover) label input:checked ~ .icon,
.rating:hover label:hover input ~ .icon {
  color: rgb(15, 184, 15);
}

</style>
<main class="my-8">
<div class="container mx-auto px-6">
    <h3 class="text-gray-700 text-2xl font-medium">To Review</h3>
    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
        <div class=" inline-block min-w-full shadow rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">

                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                           Product
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">

                        </th>

                    </tr>
                </thead>
                <tbody>
                @foreach ($toreview as $orderproduct)

                    @forelse ($orderproduct->products as $item)

                    @if ($item->isReviewed()==false )
                    <tr class="">
                        <td class="px-5 py-5   bg-white text-sm"><img width="60" src="{{asset("storage/".$item->media->path)}}"  alt="here"></td>
                        <td class="px-2 py-5  bg-white text-sm">{{$item->name}} (Purchased on :  {{\Carbon\Carbon::parse($orderproduct->created_at)->timezone('Asia/Kathmandu')->toDayDateTimeString() }})</td>
                        <td class="px-2 py-5  bg-white text-sm">


        <div class="ratingbox">

    <!-- Modal -->
    <div x-data="{ showModal : false }">
        <!-- Button -->
        <button @click="showModal = !showModal" class="px-4 py-2 text-sm bg-white rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-500 focus:outline-none focus:ring-0 font-bold hover:bg-gray-50 focus:bg-indigo-50 focus:text-indigo">Review</button>

        <!-- Modal Background -->
        <div x-show="showModal" class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0" x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <!-- Modal -->
            <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 sm:w-10/12 mx-10" @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                <!-- Title -->
                <span class="font-bold block text-2xl mb-3">Write a review! </span>

               <form class="" method="POST" action="{{route('review.store')}}">
                @csrf
  <div class="rating flex justify-center text-3xl">

  <label>
    <input type="radio" name="rating" value="1" />
    <span class="icon far fa-angry fa-lg text-yellow-500 mr-1"></span>
  </label>
  <br>
  <label>
    <input type="radio" name="rating" value="2" />
      <span class=" icon far fa-meh fa-lg text-yellow-500 mr-1"></span>
  </label>
  <br>
  <label>
    <input type="radio" name="rating" value="3" />
    <span class="icon far fa-frown fa-lg text-yellow-500 mr-1"></span>
  </label>
  <label>

    <input type="radio" name="rating" value="4" />
     <span class="icon far fa-smile fa-lg text-yellow-500 mr-1"></span>
  </label>
  <br>
  <label>
    <input type="radio" name="rating" value="5" />
       <span class=" icon far fa-grin-stars fa-lg text-yellow-500 mr-1"></span>
  </label>

  </div>
  <label for="textarea">What do you think about product?</label>
  <input type="hidden" name="product_id" value="{{$item->id}}">
<textarea name="description" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea>


                <!-- Buttons -->
                <div class="text-right space-x-5 mt-5">

                   <button type="submit" class="px-4 py-2 text-sm bg-green rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-500 focus:outline-none focus:ring-0 font-bold hover:bg-gray-50 focus:bg-indigo-50 focus:text-indigo">Post</button>

                    <button @click="showModal = !showModal" class="px-4 py-2 text-sm bg-white rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-500 focus:outline-none focus:ring-0 font-bold hover:bg-gray-50 focus:bg-indigo-50 focus:text-indigo">Cancel</button>
                     </form>
                </div>
            </div>
        </div>
    </div>


</div>




                        </td>

                    </tr>

                    @endif


                    @empty
                        <tr>
                            <td colspan="4" class="px-2 py-5  bg-white text-sm">You have nothing to review</td>
                        </tr>
                    @endforelse

   @endforeach


                </tbody>
            </table>
            {{-- <div
                class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
                PAGINATION
            </div> --}}
        </div>
    </div>
</div>
<div class="container mx-auto px-6">
    <h3 class="text-gray-700 text-2xl font-medium">My Reviews</h3>
    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
        <div class=" inline-block min-w-full shadow rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">

                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Product
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Comment
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Stars
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($myreviews as $review)

                    <div class="">

                    <tr class="">
                        <td class="px-5 py-5   bg-white text-sm"><img width="60" src="{{asset("storage/".$review->product->media->path)}}"  alt="here"></td>
                        <td class="px-2 py-5  bg-white text-sm">{{$review->product->name}}</td>
                        <td class=" py-5   bg-white text-sm">{{$review->description}}</td>
                        <td class="px-2 py-5 bg-white text-sm"><b>{{$review->rating}} Stars</b></td>
                    </tr>

                    </div>

                    @empty
                        <tr>
                            <td colspan="4" class="px-2 py-5  bg-white text-sm">You have not rated anything so sad :-(</td>
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
<script>
  $(':radio').change(function() {
  console.log('New star rating: ' + this.value);
});
  </script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('.addtocart').click(function (event){

  event.preventDefault();
  $.ajax({
    type: "POST",
    url: $(this).attr('value'),

    success: function (data) {
      console.log(data);
      $('#cart-data').load('? #cart-data');
    },
    error: function (data) {
      console.log('Error:', data);
    }
  });
});


</script>
@endsection