<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;


class TicketController extends Controller
{

    public function index()
    {
    $tickets = Ticket::all(); 
    return view('dashboard', ['tickets' => $tickets]);
    }

    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tickets.show', ['ticket' => $ticket]);
    }

    public function buy(Request $request, $id)
    {
        $ticket = Ticket::find($id);

        if ($ticket->user_id == Auth::id()) {
            return redirect()->back()->with('error', 'You cannot buy your own ticket.');
        }

        $quantity = $request->get('quantity');
        $totalPrice = $ticket->price * $quantity;

        if ($ticket->availability < $quantity) {
            return redirect()->back()->with('error', 'Not enough tickets available.');
        }

        $ticket->availability -= $quantity;
        $ticket->save();

        $cart = session()->get('cart', []);
        $cart[$ticket->id] = [
            'id' => $ticket->id,
            'name' => $ticket->title,
            'price' => $ticket->price,
            'quantity' => $quantity,
            'image' => $ticket->image
        ];
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Ticket added to cart.');
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'availability' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'image' => 'required|url',
        ]);

        Ticket::create($validatedData);

        return redirect()->route('dashboard')->with('success', 'Ticket added successfully!');
    }
    
    public function search(Request $request)
    {
        $search = $request->get('search');
        $tickets = Ticket::where('title', 'like', '%' . $search . '%')->get();

        return view('dashboard', ['tickets' => $tickets]);
    }
    
}
