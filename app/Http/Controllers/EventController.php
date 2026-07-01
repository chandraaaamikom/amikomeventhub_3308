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

        // Mengambil daftar kategori untuk keperluan menu footer.
        $categories = \App\Models\Category::all();

        return view('event-detail', compact('categories', 'event'));
    }

    public function checkout(Event $event)
    {
        return view('checkout', compact('event'));
    }

    public function processCheckout(Request $request, Event $event)
    {
        $request->validate([
            'buyer_name' => 'required|string|max:255',
            'buyer_email' => 'required|email|max:255',
            'buyer_phone' => 'required|string|max:20',
        ]);

        $serviceFee = 5000;

        $transaction = Transaction::create([
            'event_id' => $event->id,
            'order_id' => 'TRX-' . time(),
            'customer_name' => $request->buyer_name,
            'customer_email' => $request->buyer_email,
            'customer_phone' => $request->buyer_phone,
            'total_price' => $event->price + $serviceFee,
            'status' => 'success',
            'snap_token' => null,
        ]);

        if ($event->stock > 0) {
            $event->decrement('stock');
        }

        return redirect()
            ->route('ticket')
            ->with('success', 'Pemesanan tiket berhasil.')
            ->with('transaction_id', $transaction->id);
    }

    public function ticket(Request $request)
    {
        $transactionId = session('transaction_id');

        $transaction = null;

        if ($transactionId) {
            $transaction = Transaction::with('event.category')->find($transactionId);
        }

        if (!$transaction) {
            $transaction = Transaction::with('event.category')->latest()->first();
        }

        return view('ticket', compact('transaction'));
    }
}
