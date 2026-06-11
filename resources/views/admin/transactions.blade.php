@extends('layouts.admin')

@section('page-title', 'Laporan Transaksi')
@section('page-subtitle', 'Pantau arus kas dan penjualan tiket Anda.')

@section('content')
    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
        <div class="px-8 py-6 bg-slate-50/50 border-b flex flex-wrap gap-4 items-center">
            <div class="flex-1 min-w-[300px] flex gap-2">
                <input type="text" placeholder="Cari Order ID, Nama, atau Email..."
                    class="flex-1 px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition uppercase text-sm font-medium tracking-wide">
            </div>
            <div class="flex gap-2">
                <select class="px-5 py-3 rounded-xl border-slate-200 border bg-white outline-none text-sm font-bold">
                    <option>Semua Status</option>
                    <option class="text-green-600">Success</option>
                    <option class="text-orange-600">Pending</option>
                    <option class="text-rose-600">Expired</option>
                </select>
                <select class="px-5 py-3 rounded-xl border-slate-200 border bg-white outline-none text-sm font-bold">
                    <option>Bulan Ini</option>
                    <option>Bulan Lalu</option>
                    <option>Tahun 2024</option>
                </select>
            </div>
        </div>

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
                <tbody class="divide-y border-t">

                    @forelse ($transactions as $transaction)

                        <tr class="hover:bg-slate-50/50 transition">

                            <td class="px-8 py-6">
                                <span class="font-mono font-bold text-indigo-600 bg-indigo-50 px-3 py-1 rounded-lg text-sm">
                                    #{{ $transaction->order_id }}
                                </span>
                            </td>

                            <td class="px-8 py-6">
                                <p class="font-bold text-slate-800">
                                    {{ $transaction->customer_name }}
                                </p>

                                <p class="text-xs text-slate-500">
                                    {{ $transaction->customer_email }}
                                </p>

                                <p class="text-xs text-slate-400">
                                    {{ $transaction->customer_phone }}
                                </p>
                            </td>

                            <td class="px-8 py-6">
                                <p class="font-medium text-slate-700">
                                    {{ $transaction->event->title ?? '-' }}
                                </p>
                            </td>

                            <td class="px-8 py-6 text-sm text-slate-500">
                                {{ $transaction->created_at->format('d M Y, H:i') }}
                            </td>

                            <td class="px-8 py-6">

                                @if ($transaction->status == 'paid')

                                    <span
                                        class="px-3 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-bold uppercase ring-1 ring-green-200">
                                        Paid
                                    </span>

                                @else

                                    <span
                                        class="px-3 py-1 bg-slate-100 text-slate-600 rounded-lg text-xs font-bold uppercase ring-1 ring-slate-200">
                                        {{ $transaction->status }}
                                    </span>

                                @endif

                            </td>

                            <td class="px-8 py-6 text-right font-black text-slate-900">
                                Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="px-8 py-12 text-center text-slate-400 font-medium">
                                Belum ada transaksi.
                            </td>
                        </tr>

                    @endforelse

                </tbody>
            </table>
        </div>

        <div class="px-8 py-6 bg-slate-50/50 border-t">
            {{ $transactions->links() }}
        </div>
    </div>
@endsection