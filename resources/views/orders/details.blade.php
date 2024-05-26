<x-app-layout>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order Details</title>
        <link rel="stylesheet" href="{{ asset('css/orderdetails.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    <body>
        <div class="container my-5">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Order Details</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="mb-1">Order ID: {{ $order->id }}</h6>
                            <small>Date: {{ $order->created_at->format('d/m/Y') }}</small>
                        </div>
                        <div class="col-md-6 text-right">
                            <h6 class="mb-1">Total Price: Rp{{ number_format($order->total_price, 0, ',', '.') }}</h6>
                            <h6 class="mb-1">Order Status: {{ $order->status }}</h6>
                            <div class="progress">
                                <div class="progress-bar 
                                    @if($order->status == 'Received') bg-success 
                                    @elseif($order->status == 'Cancelled') bg-danger 
                                    @else bg-primary 
                                    @endif" 
                                    role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-4">
                        <div class="col-md-12 customer-info">
                            <div class="info-item">
                                <span class="info-label">Customer Name:</span>
                                <span class="info-value">{{ $order->user->name }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Customer Email:</span>
                                <span class="info-value">{{ $order->user->email }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Customer Phone:</span>
                                <span class="info-value">{{ $order->user->phone }}</span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        @foreach($order->orderItems as $item)
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            @if($item->ticket->image)
                                                <img src="{{ Storage::url($item->ticket->image) }}" class="card-img" alt="{{ $item->ticket->title }}">
                                            @else
                                                <img src="{{ asset('images/default.jpg') }}" class="card-img" alt="Default Image">
                                            @endif
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $item->ticket->title }}</h5>
                                                <p class="card-text">Total Ticket: {{ $item->quantity }}</p>
                                                <p class="card-text">Price: Rp{{ number_format($item->price, 0, ',', '.') }}</p>
                                                <p class="card-text">Total Price: Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer text-right">
                    @if($order->status != 'Cancelled')
                        <h5>Total Paid: Rp{{ number_format($order->total_price, 0, ',', '.') }}</h5>
                    @endif
                    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to Orders</a>
                </div>
            </div>
        </div>
    </body>
</x-app-layout>
