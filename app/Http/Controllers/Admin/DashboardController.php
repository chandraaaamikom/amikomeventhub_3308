<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRevenue = Transaction::where('status', 'paid')->sum('total_price');
        $ticketsSold = Transaction::where('status', 'paid')->count();
        $activeEvents = Event::count();
        $pendingOrders = Transaction::where('status', 'pending')->count();

        $latestTransactions = Transaction::with('event')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalRevenue',
            'ticketsSold',
            'activeEvents',
            'pendingOrders',
            'latestTransactions'
        ));
    }
}