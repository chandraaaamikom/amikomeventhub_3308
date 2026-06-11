<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRevenue = Transaction::whereIn('status', ['success', 'paid'])
            ->sum('total_price');

        $ticketSold = Transaction::whereIn('status', ['success', 'paid'])
            ->count();

        $activeEvents = Event::count();

        $pendingOrders = Transaction::where('status', 'pending')
            ->count();

        $latestTransactions = Transaction::with('event')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalRevenue',
            'ticketSold',
            'activeEvents',
            'pendingOrders',
            'latestTransactions'
        ));
    }
}