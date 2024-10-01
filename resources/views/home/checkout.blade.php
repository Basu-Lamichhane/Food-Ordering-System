@extends('home.layout.master')

@section('scripts')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
<script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>
@endsection

@section('content')
<main class="my-8">
    <div class="container mx-auto px-6 mb-16">
        <h3 class="text-gray-700 text-2xl font-medium">Checkout</h3>
        <div class="flex flex-col lg:flex-row mt-8">
            <div class="w-full lg:w-1/2 order-2">
                <form class="mt-8 lg:w-3/4" method="POST" action="{{ route('orders.store') }}" id="payment-form">
                    @csrf
                    <div>
                        <h4 class="text-sm text-gray-500 font-medium">Payment Method</h4>
                        <div class="m-2">
                            @if(session()->has('error'))
                            <div class="text-red-400 font-semibold p-2">
                                {{ session()->get('error') }}
                            </div>
                            @endif
                        </div>

                        <div class="mt-6">
                            <div class="flex items-center justify-between w-full bg-white rounded-md border-2 border-blue-500 p-4">
                                <label class="flex items-center">
                                    <input type="radio" name="payment_method" value="esewa" class="form-radio h-5 w-5 text-blue-600" id="esewa">
                                    <span class="ml-2 text-sm text-gray-700">Esewa</span>
                                </label>
                            </div>
                        </div>

                        <div class="mt-6">
                            <div class="flex items-center justify-between w-full bg-white rounded-md border-2 border-blue-500 p-4">
                                <label class="flex items-center">
                                    <input type="radio" name="payment_method" value="cash-on-delivery" class="form-radio h-5 w-5 text-blue-600" id="cash" checked>
                                    <span class="ml-2 text-sm text-gray-700">Cash-on Delivery</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <input
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                            name="discount" type="text" placeholder="Add coupon" id="coupon">
                    </div>

                    <div class="mt-8">
                        <h4 class="text-sm text-gray-500 font-medium">Delivery Address</h4>
                        <div class="mt-6 flex">
                            <label class="block w-3/12">
                                <select name="city" id="city" class="form-select text-gray-700 mt-1 block w-full @error('city') is-invalid @enderror">
                                    @forelse($regions as $region)
                                    <option value="{{ $region->name }}">{{ $region->name }}</option>
                                    @empty
                                    <option>No Regions found</option>
                                    @endforelse
                                </select>
                            </label>
                            <label class="block flex-1 ml-3">
                                <input type="text" name="address_line"
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="Address Line" required>
                            </label>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h3 class="text-sm text-gray-500 font-medium mb-2">Choose Delivery Area from the map</h3>
                        <div id="map" style="height: 300px;"></div>
                        <br>
                        <a class="bg-green-400 p-2 m-2 hover:bg-green-300 rounded-md border-green-200 text-white" style="cursor: pointer;" id="confirmPosition">Confirm Position</a>
                        <br>
                        <div class="bg-green-100 p-2 m-2 rounded-md" style="font-size: 11px;">
                            <b class="text-red-400">Will be Removed In Production</b>
                            <p>On idle position: <span id="onIdlePositionView"></span></p>
                            <p>On click position: <span id="onClickPositionView"></span></p>
                            <p>Please Turn On Your Location and allow if you are on mobile phone</p>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h4 class="text-sm text-gray-500 font-medium">Phone Number</h4>
                        <div class="mt-6 flex">
                            <label class="block flex-1">
                                <input type="number" name="phone" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                    placeholder="Phone" required>
                            </label>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-8">
                        <a class="flex items-center text-gray-700 text-sm font-medium rounded hover:underline focus:outline-none">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                            </svg>
                            <span class="mx-2">Back step</span>
                        </a>
                        <input id="latitude" name="lat" type="hidden" value="">
                        <input id="longitude" name="lng" type="hidden" value="">
                        <input id="total" name="total" type="hidden" value="">
                        <button type="submit"
                            class="flex items-center px-3 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                            <span>Continue</span>
                            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

            <div class="w-full mb-8 flex-shrink-0 order-1 lg:w-1/2 lg:mb-0 lg:order-2 ">
                <div class="flex justify-center lg:justify-end">
                    <div class="border rounded-md max-w-md w-full px-4 py-3">
                        <div class="flex items-center justify-between">
                            <h3 class="text-gray-700 font-medium">Order total ({{ count(session('cart')) }})</h3>
                        </div>

                        {{-- Cart Items --}}
                        @if(session('cart'))
                        @php
                        $total = 0;
                        @endphp
                        @foreach(session('cart') as $item)
                        @php
                        $product = App\Models\Product::find($item['product_id']);
                        if ($product) {
                        $sub_total = $product->price * $item['quantity'];
                        $total += $sub_total;
                        @endphp
                        <div class="flex justify-between mt-6">
                            <div class="flex">
                                <img class="h-20 w-20 object-cover rounded"
                                    src="{{ asset("storage/".$product->media->path) }}"
                                    alt="">
                                <div class="mx-3">
                                    <h3 class="text-sm text-gray-600">{{ $product->name }}</h3>
                                </div>
                            </div>
                            <span class="text-gray-600">{{ $item['quantity'] }} x NPR.{{ $product->price }} = NPR.{{ $sub_total }}</span>
                        </div>
                        @php
                        }
                        @endphp
                        @endforeach
                        @endif
                        {{-- End Cart Items --}}

                        <hr class="my-1">
                        <div class="flex justify-between mt-6">
                            <div class="flex flex-col">
                                <span>Total<b>: NPR.{{ $total }}</b></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    // Get element references
    var confirmBtn = document.getElementById('confirmPosition');
    var onClickPositionView = document.getElementById('onClickPositionView');
    var onIdlePositionView = document.getElementById('onIdlePositionView');

    // Initialize locationPicker plugin
    var lp = new locationPicker('map', {
        setCurrentPosition: true,
    }, {
        zoom: 17
    });

    // Listen to button onclick event
    confirmBtn.onclick = function() {
        // Get current location and show it in HTML
        var location = lp.getMarkerPosition();
        onClickPositionView.innerHTML = 'The chosen location is ' + location.lat + ', ' + location.lng;
        document.getElementById("latitude").value = location.lat;
        document.getElementById("longitude").value = location.lng;
    };

    // Listen to map idle event
    google.maps.event.addListener(lp.map, 'idle', function(event) {
        var location = lp.getMarkerPosition();
        onIdlePositionView.innerHTML = 'The chosen location is ' + location.lat + ', ' + location.lng;
    });

    document.addEventListener('DOMContentLoaded', () => {
        // Get all radio buttons by name
        const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
        const form = document.getElementById('payment-form');
        const coupon = document.getElementById('coupon');
        const total = document.getElementById('total');

        console.log(form);
        // Function to handle the change event
        function handlePaymentMethodChange(event) {
            const selectedMethod = event.target.value;
            console.log('Selected payment method:', selectedMethod);

            // Set the selected payment method in the form
            if (selectedMethod === "esewa") {
                form.action = "{{ route('epay') }}?total={{ $total }}";
                form.method = "GET"; // Assuming your backend accepts GET requests for Esewa
                coupon.type = "hidden";
                total.value = "{{$total}}";
            } else if (selectedMethod === "cash-on-delivery") {
                form.action = "{{ route('orders.store') }}";
                form.method = "POST"; // Assuming your backend accepts POST requests for cash on delivery
                coupon.type = "text";
            }
        }

        // Add event listeners to each radio button
        paymentMethods.forEach((radio) => {
            radio.addEventListener('change', handlePaymentMethodChange);
        });
    });
</script>
@endsection