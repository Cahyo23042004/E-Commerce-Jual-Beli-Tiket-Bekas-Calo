<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SellController extends Controller
{
    public function mySelling()
{
    $tickets = Ticket::where('user_id', auth()->id())
                ->orderBy('created_at', 'desc') 
                ->get();
                
    $orders = Order::whereHas('orderItems.ticket', function ($query) {
                    $query->where('user_id', auth()->id());
                })
                ->with(['orderItems.ticket', 'user'])
                ->orderBy('created_at', 'desc') 
                ->get();

    return view('sell.my-selling', compact('tickets', 'orders'));
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'availability' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public/images', $filename);
        $validatedData['image'] = $filename;
    }

    $validatedData['user_id'] = Auth::id();

    Ticket::create($validatedData);

    return redirect()->route('sell.mySelling')->with('success', 'Ticket added successfully!');
}


    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('sell.edit', compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'availability' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $ticket = Ticket::findOrFail($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/images', $filename);
            $validatedData['image'] = $filename;
        }

        $ticket->update($validatedData);

        return redirect()->route('sell.mySelling')->with('success', 'Ticket updated successfully!');
    }

    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        if ($ticket) {
            $ticket->delete();
            return redirect()->route('sell.mySelling')->with('success', 'Ticket deleted successfully.');
        }
        return redirect()->route('sell.mySelling')->with('error', 'Ticket not found.');
    }
}
