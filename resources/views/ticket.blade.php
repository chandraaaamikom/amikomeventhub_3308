@extends('layouts.app')

@section('title', 'E-Ticket - AmikomEventHub')

@section('content')
    <section class="min-h-screen bg-indigo-600 px-6 py-16 text-white">

        <div class="max-w-4xl mx-auto text-center">

            <div class="w-20 h-20 mx-auto mb-6 bg-white text-indigo-600 rounded-full flex items-center justify-center text-4xl font-black shadow-xl">
                ✓
            </div>

            <h1 class="text-4xl font-black mb-3">
                Pembayaran Berhasil!
            </h1>

            <p class="text-indigo-100 text-lg mb-10">
                Tiket Anda telah terbit dan siap digunakan.
            </p>

            @if ($transaction)
                <div class="max-w-xl mx-auto bg-white text-slate-900 rounded-[2rem] overflow-hidden shadow-2xl">

                    {{-- HEADER TICKET --}}
                    <div class="bg-slate-100 px-8 py-8 text-center">
                        <p class="text-indigo-600 font-black uppercase tracking-widest mb-3">
                            E-Ticket Resmi
                        </p>

                        <h2 class="text-3xl font-black leading-tight">
                            {{ $transaction->event->title ?? 'Event Tidak Ditemukan' }}
                        </h2>
                    </div>

                    <div class="border-t-4 border-dashed border-indigo-100 relative">
                        <div class="absolute -left-5 -top-5 w-10 h-10 rounded-full bg-indigo-600"></div>
                        <div class="absolute -right-5 -top-5 w-10 h-10 rounded-full bg-indigo-600"></div>
                    </div>

                    {{-- BODY TICKET --}}
                    <div class="p-8">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-left mb-8">

                            <div>
                                <p class="text-xs font-black uppercase text-slate-400 mb-2">
                                    Nama Pembeli
                                </p>
                                <p class="text-xl font-black text-slate-900">
                                    {{ $transaction->customer_name }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs font-black uppercase text-slate-400 mb-2">
                                    Tanggal & Waktu
                                </p>
                                <p class="text-xl font-black text-slate-900">
                                    {{ $transaction->event && $transaction->event->date ? \Carbon\Carbon::parse($transaction->event->date)->format('d M Y, H:i') : '-' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs font-black uppercase text-slate-400 mb-2">
                                    Order ID
                                </p>
                                <p class="text-xl font-black text-slate-900">
                                    {{ $transaction->order_id }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs font-black uppercase text-slate-400 mb-2">
                                    Lokasi
                                </p>
                                <p class="text-xl font-black text-slate-900">
                                    {{ $transaction->event->location ?? '-' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs font-black uppercase text-slate-400 mb-2">
                                    Email
                                </p>
                                <p class="text-base font-bold text-slate-700 break-all">
                                    {{ $transaction->customer_email }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs font-black uppercase text-slate-400 mb-2">
                                    Total Bayar
                                </p>
                                <p class="text-xl font-black text-indigo-600">
                                    Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
                                </p>
                            </div>

                        </div>

                        {{-- QR DUMMY --}}
                        <div class="bg-slate-100 rounded-3xl p-6 text-center">
                            <p class="text-xs font-black uppercase text-slate-400 mb-5">
                                Scan QR untuk Check-In
                            </p>

                            <div class="w-44 h-44 bg-white mx-auto rounded-2xl shadow-lg flex items-center justify-center">
                                <div class="grid grid-cols-4 gap-1">
                                    @for ($i = 1; $i <= 16; $i++)
                                        <div class="w-8 h-8 {{ in_array($i, [1, 2, 4, 6, 7, 9, 11, 12, 14, 16]) ? 'bg-slate-900' : 'bg-white' }} border border-slate-200"></div>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 flex flex-col sm:flex-row gap-4">
                            <a href="{{ route('home') }}"
                                class="flex-1 px-6 py-4 bg-indigo-600 text-white rounded-2xl font-black hover:bg-indigo-700 transition text-center">
                                Kembali ke Home
                            </a>

                            <a href="{{ route('katalog') }}"
                                class="flex-1 px-6 py-4 bg-slate-100 text-slate-700 rounded-2xl font-black hover:bg-slate-200 transition text-center">
                                Lihat Event Lain
                            </a>
                        </div>

                    </div>
                </div>
            @else
                <div class="max-w-xl mx-auto bg-white text-slate-900 rounded-[2rem] p-10 shadow-2xl">
                    <h2 class="text-2xl font-black mb-3">
                        Belum ada tiket.
                    </h2>

                    <p class="text-slate-500 mb-6">
                        Silakan pesan tiket terlebih dahulu melalui katalog event.
                    </p>

                    <a href="{{ route('katalog') }}"
                        class="inline-block px-6 py-4 bg-indigo-600 text-white rounded-2xl font-black hover:bg-indigo-700 transition">
                        Buka Katalog
                    </a>
                </div>
            @endif

        </div>

    </section>
@endsection