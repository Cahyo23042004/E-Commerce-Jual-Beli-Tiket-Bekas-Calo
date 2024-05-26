
<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home page') }}
        </h2>
    </x-slot>

    <div class="search-container">
        <form action="{{ route('search') }}" method="GET">
            <input type="text" class="search" name="search" placeholder="Search tickets">
            <button type="submit" class="search-button">Search</button>
        </form>
    </div>
    

    <div class="tickets-container">
        @foreach ($tickets as $ticket)
            <div class="ticket-card">
                <a href="{{ route('tickets.show', $ticket->id) }}">
                    <img src="{{ Storage::url($ticket->image) }}" alt="{{ $ticket->title }}" class="ticket-image">
                    <div class="ticket-info">
                        <h2 class="ticket-title">{{ $ticket->title }}</h2>
                        <p class="ticket-date">{{ $ticket->date }}</p>
                        <p class="ticket-availability">Available : {{ $ticket->availability }} Ticket</p>
                        <p class="ticket-price">Rp{{ number_format($ticket->price, 0, ',', '.') }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</x-app-layout>
