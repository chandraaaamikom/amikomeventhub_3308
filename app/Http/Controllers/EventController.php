<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Transaction;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show(Event $event)
    {
        $event->load('category');

        return view('event-detail', compact('event'));
    }

    public function checkout(Event $event)
    {
        return view('checkout', compact('event'));
    }

    public function processCheckout(Request $request, Event $event)
    {
        $request->validate([
            'buyer_name' => 'required|string|max:255',
            'buyer_email' => 'required|email',
            'buyer_phone' => 'required|string|max:20',
        ]);

        $serviceFee = 5000;

        Transaction::create([
            'event_id' => $event->id,
            'order_id' => 'INV-' . time(),
            'customer_name' => $request->buyer_name,
            'customer_email' => $request->buyer_email,
            'customer_phone' => $request->buyer_phone,
            'total_price' => $event->price + $serviceFee,
            'status' => 'paid',
            'snap_token' => null,
        ]);

        return redirect()->route('ticket');
    }

    public function ticket()
    {
        return view('ticket');
    }
}