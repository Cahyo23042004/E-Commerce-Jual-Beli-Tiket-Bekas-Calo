<x-app-layout>
    <head>
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Ticket') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="form-container">
            <div class="card">
                <div class="card-header">Edit Ticket</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('sell.update', $ticket->id) }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Title -->
                        <div class="form-group">
                            <label for="title">Ticket Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $ticket->title }}" required>
                        </div>
                        <!-- Price -->
                        <div class="form-group">
                            <label for="price">Price (Rp)</label>
                            <input type="number" step="50000" class="form-control" id="price" name="price" value="{{ $ticket->price }}" required min="0">
                        </div>
                        <!-- Availability -->
                        <div class="form-group">
                            <label for="availability">Availability</label>
                            <input type="number" class="form-control" id="availability" name="availability" value="{{ $ticket->availability }}" required min="0">
                        </div>
                        <!-- Image -->
                        <div class="form-group">
                            <label for="image">Insert Ticket Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary btn-block">Update Ticket</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
