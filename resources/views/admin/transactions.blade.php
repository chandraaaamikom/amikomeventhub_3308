@extends('layouts.admin')

@section('title', 'Laporan Transaksi - AmikomEventHub')
@section('page-title', 'Laporan Transaksi')

@section('content')
    <div class="mb-10">
        <h1 class="text-4xl font-black text-slate-900">
            Laporan Transaksi
        </h1>
        <p class="text-slate-500 font-medium mt-2">
            Kelola dan pantau seluruh transaksi pemesanan tiket.
        </p>
    </div>

    <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">

        {{-- FILTER --}}
        <div class="p-8 border-b border-slate-100">
            <form method="GET" action="{{ route('admin.transactions.index') }}"
                class="grid grid-cols-1 md:grid-cols-4 gap-4">

                <div class="md:col-span-2">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari order ID, nama, atau email..."
                        class="w-full px-5 py-4 bg-white border-2 border-slate-100 rounded-2xl outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-600/10 transition font-semibold">
                </div>

                <div>
                    <select name="status"
                        class="w-full px-5 py-4 bg-white border-2 border-slate-100 rounded-2xl outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-600/10 transition font-semibold">
                        <option value="all" {{ request('status') === 'all' ? 'selected' : '' }}>Semua Status</option>
                        <option value="success" {{ request('status') === 'success' ? 'selected' : '' }}>Success</option>
                        <option value="paid" {{ request('status') === 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    </select>
                </div>

                <div>
                    <button type="submit"
                        class="w-full px-5 py-4 bg-indigo-600 text-white rounded-2xl font-black hover:bg-indigo-700 transition">
                        Filter
                    </button>
                </div>

            </form>
        </div>

        {{-- TABLE --}}
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                    <tr>
                        <th class="px-8 py-4">Order ID</th>
                        <th class="px-8 py-4">Detail Pembeli</th>
                        <th class="px-8 py-4">Event</th>
                        <th class="px-8 py-4">Tgl Transaksi</th>
                        <th class="px-8 py-4">Status</th>
                        <th class="px-8 py-4 text-right">Total Tagihan</th>
                    </tr>
                </thead>

                <tbody class="divide-y border-t border-slate-100">
                    @forelse ($transactions as $transaction)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-8 py-6">
                                <span class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-lg text-xs font-black">
                                    #{{ $transaction->order_id }}
                                </span>
                            </td>

                            <td class="px-8 py-6">
                                <p class="font-black text-slate-900 uppercase tracking-wide text-sm">
                                    {{ $transaction->customer_name }}
                                </p>
                                <p class="text-xs text-slate-400">
                                    {{ $transaction->customer_email }}
                                </p>
                                <p class="text-xs text-slate-400">
                                    {{ $transaction->customer_phone }}
                                </p>
                            </td>

                            <td class="px-8 py-6 font-semibold text-slate-600">
                                {{ $transaction->event->title ?? '-' }}
                            </td>

                            <td class="px-8 py-6 text-slate-500 font-medium">
                                {{ $transaction->created_at ? $transaction->created_at->format('d M Y, H:i') : '-' }}
                            </td>

                            <td class="px-8 py-6">
                                @if ($transaction->status === 'success' || $transaction->status === 'paid')
                                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-bold uppercase">
                                        Success
                                    </span>
                                @elseif ($transaction->status === 'pending')
                                    <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-lg text-xs font-bold uppercase">
                                        Pending
                                    </span>
                                @else
                                    <span class="px-3 py-1 bg-slate-100 text-slate-600 rounded-lg text-xs font-bold uppercase">
                                        {{ $transaction->status }}
                                    </span>
                                @endif
                            </td>

                            <td class="px-8 py-6 font-black text-indigo-600 text-right">
                                Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-8 py-12 text-center">
                                <h3 class="text-xl font-black text-slate-900">
                                    Belum ada transaksi.
                                </h3>
                                <p class="text-slate-500 mt-2">
                                    Transaksi akan muncul setelah pembeli melakukan checkout.
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- PAGINATION --}}
        <div class="p-8 border-t border-slate-100 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <p class="text-slate-500 font-medium">
                Menampilkan {{ $transactions->count() }} dari {{ $transactions->total() }} transaksi
            </p>

            <div>
                {{ $transactions->links() }}
            </div>
        </div>

    </div>
@endsection