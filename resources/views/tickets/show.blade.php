<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/detailtiket.css') }}">
    </head>
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="ticket-detail">
        <img src="{{ Storage::url($ticket->image) }}" alt="{{ $ticket->title }}" class="ticket-image-detail">
        <h2 class="ticket-title-detail">{{ $ticket->title }}</h2>
        <p class="ticket-price-detail">Price : Rp{{ number_format($ticket->price, 0, ',', '.') }}</p>
        <p class="ticket-availability-detail">Available: {{ $ticket->availability }} Ticket</p>

        <form action="{{ route('tickets.buy', $ticket->id) }}" method="POST" class="buy-form">
            @csrf
            <label for="quantity" class="quantity-label">Ticket Total:</label>
            <input type="number" id="quantity" name="quantity" min="1" max="{{ $ticket->availability }}" class="quantity-input">
            <button type="submit" class="buy-button">Buy Tiket</button>
        </form>
    </div>
</x-app-layout>
