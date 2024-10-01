@extends('home.layout.master')
@section('content')
<main class="my-8">
  <div class="container mx-auto px-6">
      <h3 class="text-gray-700 text-2xl font-medium">Menu</h3>
      <div class="flex-grow">

        <div class="w-full border p-2">
            @foreach ($categories as $category)
            <div class="flex  my-1 hover:bg-gray-100 rounded border-b">
                <div class="w-4/5 h-12 py-3 px-2">
                  <p class="hover:text-blue-dark">{{$category->name}}</p>
                </div>
                <div class="w-1/5 h-12 text-right p-3">
                  <p class="text-sm"><a href="{{url('browse/'.$category->id)}}" class="bg-green-300 p-2 rounded-md">Browse</a></p>
                </div>
              </div>
            @endforeach

        </div>
      </div>

  </div>
</main>

@endsection