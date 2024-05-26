<x-app-layout>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Calo | Shopping Cart</title>
        <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart') }}
        </h2>
    </x-slot>
    <div class="wrapper">
        <h1>Shopping Cart</h1>

        <div class="project">
            @php $totalPrice = 0; @endphp

            @if (count($cartItems) > 0)
                @foreach($cartItems as $item)
                    <div class="shop">
                        <div class="box">
                            <img src="{{ Storage::url($item['image']) }}" alt="{{ $item['name'] }}">
                            <div class="content">
                                <h3>{{ $item['name'] }} <br> Rp{{ number_format($item['price'], 0, ',', '.') }}</h3>
                                @php 
                                    $totalItemPrice = $item['price'] * $item['quantity']; 
                                    $totalPrice += $totalItemPrice; 
                                @endphp
                                <h4>Total Price: Rp{{ number_format($totalItemPrice, 0, ',', '.') }}</h4>
                                <div class="quantity">
                                    <form action="{{ route('cart.update', $item['id']) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <p class="unit">Quantity: 
                                            <input name="quantity" value="{{ $item['quantity'] }}" type="number" min="1">
                                        </p>
                                        <p class="update">
                                            <button type="submit"><span>Update</span></button>
                                        </p>
                                    </form>
                                </div>
                                <p class="btn-area">
                                    <form action="{{ route('cart.destroy', $item['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn2"><i class="fa fa-trash"></i> Remove</button>
                                    </form>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="removeall">
                    <a href="{{ route('cart.removeAll') }}">Remove All</a>
                </div>

                <div class="right-bar">
                    <p><span>Grand Total</span> <hr> <span>Rp{{ number_format($totalPrice, 0, ',', '.') }}</span></p>
                    <a href="{{ route('cart.checkout') }}"><i class="fas fa-shopping-cart"></i> Checkout</a>
                </div>
                <div class="add-more">
                    <a href="{{ route('dashboard') }}" class="btn3">Buy More Tickets</a>
                </div>
            @else
            <div class="empty-cart">
                <p>Your shopping basket is empty</p>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
