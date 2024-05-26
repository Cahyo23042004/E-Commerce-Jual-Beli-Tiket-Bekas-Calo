<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Orders') }}
        </h2>
    </x-slot>

    <!-- Head section -->
    <head>
        <!-- Meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Title -->
        <title>My Orders</title>
        <!-- External CSS -->
        <link rel="stylesheet" href="{{ asset('css/orders.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    
    <!-- Body section -->
    <body>
        <!-- Tab buttons -->
        <div class="tab">
            <button class="tablinks" onclick="openOrders(event, 'currentOrders')">Current Orders</button>
            <button class="tablinks" onclick="openOrders(event, 'pastOrders')">Past Orders</button>
        </div>

        <!-- Current Orders tab content -->
        <div id="currentOrders" class="tabcontent" style="display: none;">
            <div class="container">
                <!-- Loop through current orders -->
                @foreach($currentOrders as $order)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order #{{ $order->id }}</h5>
                        <p class="card-text">Status: {{ $order->status }}</p>
                        <p class="card-text">Total Price: Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>
                        <div class="btn-group">
                            <a href="{{ route('orders.details', $order->id) }}" class="btn btn-primary">See Details</a>
                            <a href="{{ route('orders.cancel', $order->id) }}" class="btn btn-danger">Cancel Order</a>
                            @if($order->status == 'Processing')
                            <form action="{{ route('orders.received', $order->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-success">Mark as Received</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Past Orders tab content -->
        <div id="pastOrders" class="tabcontent" style="display: none;">
            <div class="container">
                <!-- Loop through past orders -->
                @foreach($pastOrders as $order)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order #{{ $order->id }}</h5>
                        <p class="card-text">Status: {{ $order->status }}</p>
                        <p class="card-text">Total Price: Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>
                        <div class="btn-group">
                            <a href="{{ route('orders.details', $order->id) }}" class="btn btn-primary">See Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- JavaScript for tab functionality -->
        <script>
            function openOrders(evt, ordersType) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(ordersType).style.display = "block";
                evt.currentTarget.className += " active";
            }

            // Default open the current orders tab
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelector('.tablinks').click();
            });
        </script>
    </body>
</x-app-layout>
