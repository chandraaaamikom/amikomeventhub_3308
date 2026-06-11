<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaction::with('event')
            ->when($request->search, function ($query, $search) {
                $query->where('order_id', 'LIKE', '%' . $search . '%')
                    ->orWhere('customer_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('customer_email', 'LIKE', '%' . $search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('admin.transactions', compact('transactions'));
    }
}