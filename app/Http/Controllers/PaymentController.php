<?php

namespace App\Http\Controllers;
use App\Models\Order;

class PaymentController extends Controller
{
    public function index()
    {
        $order = Order::latest()->first();

        if (!$order) {
            $message = 'No orders found.';
            return view('payment.index', ['message' => $message]);
        }

        $sellers = $order->orderItems->map(function ($item) {
            return $item->ticket->user;
        })->unique('id');

        return view('payment.index', ['order' => $order, 'sellers' => $sellers]);
    }
}
