<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Calo | Purchase Verification</title> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/success.css') }}" />
    </head>
    <body>
        <div class="wrapper">
            <div class="container">
                <div class="success-section">
                    <div class="check-icon">
                        <div class="icon-line line-tip"></div>
                        <div class="icon-line line-long"></div>
                        <div class="icon-circle"></div>
                        <div class="icon-fix"></div>
                    </div>
                </div>

                <div class="title-section">
                    <p class="para">Thank you wholeheartedly for choosing <span>Calo</span>!</p>
                </div>

                <div class="customer-info">
                    <p>Order ID: {{ $order->id }}</p>
                    <p>Order Date: {{ $order->created_at }}</p>
                    <div class="order-details">
                        @foreach ($order->orderItems as $item)
                            <p>{{ $item->quantity }} x {{ $item->ticket->title }}: Rp{{ number_format($item->price, 0, ',', '.') }}</p>
                        @endforeach
                    </div>
                    <p class="total">Total price of my Order: Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>
                </div>

               

                @if($sellers)
                    @foreach($sellers as $seller)
                        <div class="seller-info">
                            <p>Seller Name: {{ $seller->name }}</p>
                            <p>Seller Phone: {{ $seller->phone }}</p>
                            <div class="submit-btn">
                                <a href="https://wa.me/{{ $seller->phone }}" class="btn btn-success">
                                    Chat Seller to COD your Ticket
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No seller information available.</p>
                @endif

                <div class="submit-btn">
                    <a href="{{ route('orders.index') }}" class="btn btn-secondary">View My Orders</a>
                </div>
                <div class="submit-btn">
                    <a href="{{ route('dashboard') }}" class="btn" id="gallery">Back to Homepage</a>
                </div>
               
            </div>
        </div>
    </body>
    </html>
</x-app-layout>
