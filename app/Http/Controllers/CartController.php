<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Order;

class CartController extends Controller
{
    public function index()
{
    $cartItems = session()->get('cart', []);

    return view('cart.index', [
        'cartItems' => $cartItems,
    ]);
}


    public function store(Request $request)
    {
        $ticket = Ticket::find($request->id);
        $quantity = $request->quantity;

        if ($ticket->availability < $quantity) {
            return back()->with('error', 'Produk sudah habis.');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$ticket->id])) {
            $cart[$ticket->id]['quantity'] += $quantity;
        } else {
            $cart[$ticket->id] = [
                'id' => $ticket->id,
                'name' => $ticket->title,
                'price' => $ticket->price,
                'quantity' => $quantity,
                "image" => $ticket->image
            ];
        }

        $cart[$ticket->id]['total_price'] = $cart[$ticket->id]['price'] * $cart[$ticket->id]['quantity'];

        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    public function update($rowId, Request $request)
{
    $cart = session()->get('cart', []);
    $quantity = $request->input('quantity');

    if ($quantity <= 0) {
        return back()->with('error', 'Quantity must be greater than 0.');
    }

    if (isset($cart[$rowId])) {
        $cart[$rowId]['quantity'] = $quantity;
        $cart[$rowId]['total_price'] = $cart[$rowId]['price'] * $cart[$rowId]['quantity'];
        session()->put('cart', $cart);
    }

    return redirect()->route('cart.index');
}



    public function destroy($itemId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$itemId])) {
            unset($cart[$itemId]);
            session()->put('cart', $cart);
        }

        return back();
    }

    public function checkout()
{
    $cartItems = session()->get('cart', []);

    if (empty($cartItems)) {
        return redirect()->route('cart.index')->with('error', 'Keranjang belanja anda kosong.');
    }

    $totalQuantity = 0;
    $totalPrice = 0;

    foreach ($cartItems as $item) {
        $totalQuantity += $item['quantity'];
        $totalPrice += $item['price'] * $item['quantity'];
    }

    $order = new Order;
    $order->user_id = auth()->id();
    $order->total_quantity = $totalQuantity;
    $order->total_price = $totalPrice;
    $order->status = 'Processing';
    $order->save();

    foreach ($cartItems as $item) {
        $order->orderItems()->create([
            'ticket_id' => $item['id'],
            'quantity' => $item['quantity'],
            'price' => $item['price'],
        ]);

        $ticket = Ticket::find($item['id']);
        $ticket->availability -= $item['quantity'];
        $ticket->save();
    }

    session()->forget('cart');
    return redirect()->route('payment.index')->with('success', 'Pesanan anda telah berhasil dibuat.');
}



        public function removeAll()
{
        session()->forget('cart');
        return redirect()->route('cart.index');
}
}
