<x-app-layout>
    <head>
    <link rel="stylesheet" href="{{ asset('css/sell.css') }}">
</head>

    <div class="sell-container">
        <div class="sell-button-container mb-5">
            <button id="sellTicketButton" class="btn btn-primary">Sell Ticket</button>
            <button id="listTicketsButton" class="btn btn-secondary">My List Tickets</button>
            <button id="myOrdersButton" class="btn btn-info">My Selling Orders</button>
        </div>

        <div id="sellFormContainer" class="sell-form-container mb-5 sell-hidden">
            <div class="sell-card">
                <div class="sell-card-header">Sell Ticket</div>
                <div class="sell-card-body">
                    <form id="sellForm" method="POST" action="{{ route('sell.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="sell-form-group">
                            <label for="title">Ticket Title</label>
                            <input type="text" class="sell-form-control" id="title" name="title" required>
                        </div>
                        <div class="sell-form-group">
                            <label for="price">Price (Rp)</label>
                            <input type="number" step="50000" class="sell-form-control" id="price" name="price" required min="0">
                        </div>
                        <div class="sell-form-group">
                            <label for="availability">Availability</label>
                            <input type="number" class="sell-form-control" id="availability" name="availability" required min="0">
                        </div>
                        <div class="sell-form-group">
                            <label for="image">Insert Ticket Image</label>
                            <input type="file" class="sell-form-control" id="image" name="image" required>
                        </div>
                        <button type="submit" class="btn btn-primary sell-btn-block">Sell Ticket</button>
                        <button type="button" id="previewButton" class="btn btn-secondary sell-btn-block mt-3">Preview</button>
                    </form>
                </div>
            </div>
        </div>

        <div id="sellPreviewContainer" class="sell-preview-container sell-hidden">
            <div class="sell-card">
                <div class="sell-card-body">
                    <img id="previewImage" src="#" alt="Preview Image" class="sell-img-fluid mb-3">
                    <div class="sell-preview-details">
                        <h5 id="previewTitle"></h5>
                        <p id="previewPrice"></p>
                        <p id="previewAvailability"></p>
                        <button type="button" id="cancelPreview" class="btn btn-secondary">Cancel Preview</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="listTicketsContainer" class="sell-list-tickets sell-hidden">
            @foreach($tickets as $ticket)
                <div class="sell-ticket-card sell-card mb-4">
                    <div class="sell-card-body">
                        <img src="{{ asset('storage/images/' . $ticket->image) }}" alt="Ticket Image" class="sell-img-fluid mb-3">
                        <h5 class="sell-card-title">{{ $ticket->title }}</h5>
                        <p class="sell-card-text">Price: Rp {{ number_format($ticket->price, 0, ',', '.') }}</p>
                        <p class="sell-card-text">Availability: {{ $ticket->availability }}</p>
                        <a href="{{ route('sell.edit', $ticket->id) }}" class="btn btn-primary">Edit</a>
                        <form method="POST" action="{{ route('sell.destroy', $ticket->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mt-2">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div id="myOrdersContainer" class="sell-my-orders sell-hidden">
            @foreach($orders as $order)
                @foreach($order->orderItems as $orderItem)
                    @if ($orderItem->ticket)
                        <div class="sell-order-card sell-card mb-4">
                            <div class="sell-card-body">
                                <h5 class="sell-card-title">{{ $orderItem->ticket->title }}</h5>
                                <p class="sell-card-text">Price: Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                                <p class="sell-card-text">Quantity: {{ $orderItem->quantity }}</p>
                                <p class="sell-card-text">Phone: {{ $order->user->phone }}</p>
                                <p class="sell-card-text">Order Date: {{ $order->created_at->format('d-m-Y') }}</p>
                                <p class="sell-card-text">Status: {{ $order->status }}</p>
                                <p class="sell-card-text">Ordered By: {{ $order->user->name }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>

    <script>
        document.getElementById('sellTicketButton').addEventListener('click', function() {
            document.getElementById('sellFormContainer').classList.remove('sell-hidden');
            document.getElementById('listTicketsContainer').classList.add('sell-hidden');
            document.getElementById('myOrdersContainer').classList.add('sell-hidden');
        });

        document.getElementById('listTicketsButton').addEventListener('click', function() {
            document.getElementById('listTicketsContainer').classList.remove('sell-hidden');
            document.getElementById('sellFormContainer').classList.add('sell-hidden');
            document.getElementById('myOrdersContainer').classList.add('sell-hidden');
        });

        document.getElementById('myOrdersButton').addEventListener('click', function() {
            document.getElementById('myOrdersContainer').classList.remove('sell-hidden');
            document.getElementById('sellFormContainer').classList.add('sell-hidden');
            document.getElementById('listTicketsContainer').classList.add('sell-hidden');
        });

        document.getElementById('previewButton').addEventListener('click', function() {
            document.getElementById('sellPreviewContainer').classList.remove('sell-hidden');
            document.getElementById('previewTitle').innerText = document.getElementById('title').value;
            const price = document.getElementById('price').value;
            const formattedPrice = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(price);
            document.getElementById('previewPrice').innerText = 'Price: ' + formattedPrice;
            document.getElementById('previewAvailability').innerText = 'Availability: ' + document.getElementById('availability').value;
            const file = document.getElementById('image').files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImage').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('cancelPreview').addEventListener('click', function() {
            document.getElementById('sellPreviewContainer').classList.add('sell-hidden');
        });
    </script>
    
</x-app-layout>
