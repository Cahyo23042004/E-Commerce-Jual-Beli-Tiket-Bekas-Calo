<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $currentOrders = Order::where('user_id', auth()->id())
            ->where('status', 'Processing')
            ->orderBy('created_at', 'desc')
            ->get();

        $pastOrders = Order::where('user_id', auth()->id())
            ->where('status', '!=', 'Processing')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('orders.index', [
            'currentOrders' => $currentOrders,
            'pastOrders' => $pastOrders,
        ]);
    }

    public function accept(Order $order)
    {
        if ($order->ticket->seller_id != auth()->id()) {
            return redirect()->back()->with('error', 'You are not authorized to accept this order.');
        }

        $order->status = 'Accepted';
        $order->save();

        return redirect()->back()->with('message', 'Order accepted!');
    }

    public function cancelOrder($id)
    {
        $order = Order::find($id);
        $order->status = 'Cancelled';
        $order->save();

        return redirect()->back()->with('message', 'Order Cancelled Successfully');
    }

    public function markAsReceived($id)
    {
        $order = Order::find($id);
        $order->status = 'Received';
        $order->save();

        return redirect()->back()->with('message', 'Order Marked as Received Successfully');
    }

    public function details(Order $order)
    {
        $order->load(['orderItems.ticket', 'user']);
        return view('orders.details', [
            'order' => $order,
        ]);
    }

    public function mySellingOrders()
    {
        $user = Auth::user();
        $tickets = Ticket::where('user_id', $user->id)->pluck('id');
        $orders = Order::whereIn('ticket_id', $tickets)->with('ticket')->get();

        return view('sell.my-selling-orders', compact('orders'));
    }
}
