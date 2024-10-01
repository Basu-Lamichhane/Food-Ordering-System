@extends('home.layout.master')
@section('content')
<link rel="stylesheet" href="{{ asset('css/tinyslider.css') }}">
<link rel="stylesheet" href="{{ asset('css/slider.css') }}">
<main class="my-8">
    <div class="container mx-auto px-6">
        {{-- Start browse Products --}}
        <h3 class="text-gray-700 text-2xl font-medium ">Recent Additions</h3>
        <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3  mt-6">
            <x-productcard :items="$products" />
        </div>
        <div class="my-4 mx-2">
            {{ $products->links() }}
        </div>
        {{-- End browse Products --}}
        {{-- Sections --}}
        @foreach ($sections as $section)
        <x-sectionlist :sectiondata="$sections" :sectionid="$section->id" />
        @endforeach
    <div class="slider-container" id="slider">
      @foreach($sliders as $slider)
        @if($slider->media_id && $slider)
          <div>
            @if(!empty($slider->url))
            <a href="{{ url($slider->url) }}">
            @endif
              <img
                class="shadow-sm"
                src="/storage/{{ $slider->media->path }}"
                alt="{{ $slider->title }}"
              >
            @if(!empty($slider->url))
            </a>
            @endif

          </div>
        @endif
      @endforeach
    </div>
    </div>
</main>
<script src="{{ asset('js/tinyslider.js') }}"></script>
<script src="{{ asset('js/slider.js') }}"></script>
@endsection
