@extends('home.layout.master')

@section('content')

@php
// Retrieve total amount from the URL
$amt = request()->get('total', 0); // Set total from request or default to 0
$phone = request()->get('phone', 0);
$city = request()->get('city', 'null');
$lat = request()->get('lat', 'null');
$lng = request()->get('lng', 'null');
$address_line = request()->get('address_line', 'null');

// Define charges
$tax = 10;
$product_service_charge = 10;
$product_delivery_charge = 10;

// Generate random UUID for the transaction
function generateRandomUuid() {
return sprintf(
'%s-%s-%s-%s-%s',
bin2hex(random_bytes(4)),
bin2hex(random_bytes(2)),
bin2hex(random_bytes(2)),
bin2hex(random_bytes(2)),
bin2hex(random_bytes(6))
);
}

// Generate transaction UUID
$trans_uuid = generateRandomUuid();

// Calculate total amount
$total_amt = $amt + $tax + $product_service_charge + $product_delivery_charge;

// Prepare signed field names
$parameter = "total_amount,transaction_uuid,product_code";
$signed_field_names = "total_amount=$total_amt,transaction_uuid=$trans_uuid,product_code=EPAYTEST";
$secret_key = "8gBm/:&EnhH.1/q";

// Generate signature
$s = hash_hmac("sha256", $signed_field_names, $secret_key, true);
@endphp

<body>
    <div class="invoice">
        <h2>Invoice</h2>
        <table>
            <tr>
                <th>Description</th>
                <th>Amount (NPR)</th>
            </tr>
            <tr>
                <td>Initial Amount</td>
                <td>{{ $amt }}</td>
            </tr>
            <tr>
                <td>Service Charge</td>
                <td>{{ $product_service_charge }}</td>
            </tr>
            <tr>
                <td>Delivery Charge</td>
                <td>{{ $product_delivery_charge }}</td>
            </tr>
            <tr>
                <td>Tax</td>
                <td>{{ $tax }}</td>
            </tr>
            <tr>
                <td><strong>Total Amount</strong></td>
                <td><strong>{{ $total_amt }}</strong></td>
            </tr>
        </table>

        <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST" id="epay-form">
            <input type="hidden" name="amount" value="{{ $amt }}" required>
            <input type="hidden" name="tax_amount" value="{{ $tax }}" required>
            <input type="hidden" name="total_amount" value="{{ $total_amt }}" id="total_amt" required>
            <input type="hidden" name="transaction_uuid" id="trans_uuid" value="{{ $trans_uuid }}" required>
            <input type="hidden" name="product_code" value="EPAYTEST" required>
            <input type="hidden" name="product_service_charge" value="{{ $product_service_charge }}" required>
            <input type="hidden" name="product_delivery_charge" value="{{ $product_delivery_charge }}" required>
            <input type="hidden" name="success_url" value="{{ route('orders.index') }}" required>
            <input type="hidden" name="failure_url" value="{{ route('orders.index') }}" required>
            <input type="hidden" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
            <input type="hidden" name="signature" value="{{ base64_encode($s) }}" required>
            <button type="submit" class="pay-button">Pay with eSewa</button>
        </form>
    </div>

    <style>
        .invoice {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .pay-button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .pay-button:hover {
            background-color: #0056b3;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#epay-form').on('submit', function(e) {

                // Create a FormData object from the form
                var formData = new FormData();

                formData.append('transaction_uuid', $('#trans_uuid').val());
                formData.append('total', '{{ $amt }}');
                formData.append('phone', '{{ $phone }}');
                formData.append('city', '{{ $city }}');
                formData.append('lat', '{{ $lat }}');
                formData.append('lng', '{{ $lng }}');
                formData.append('address_line', '{{ $address_line }}');
                formData.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    url: '{{ route("esewa_store") }}', // The route to send the request
                    type: 'POST', // The request method (POST)
                    data: formData, // The FormData object
                    contentType: false, // Necessary for FormData to work
                    processData: false, // Necessary for FormData to work
                    success: function(response) {
                        // Handle success (response can be from the controller)
                        console.log('Form submitted successfully!');
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.log(xhr.responseText);
                        console.log('Form submission failed!');
                    }
                });
            });
        });
    </script>

</body>
@endsection