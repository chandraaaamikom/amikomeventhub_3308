@extends('layouts.app')

@section('title', 'Checkout - ' . $event->title)

@section('content')
    @php
        $serviceFee = 5000;
        $total = $event->price + $serviceFee;
    @endphp

    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-slate-100 py-16">
        <div class="max-w-5xl mx-auto px-6">

            <a href="{{ route('events.show', $event->id) }}"
                class="inline-flex items-center gap-2 text-indigo-600 font-bold mb-8 hover:text-indigo-800 transition">
                ← Kembali ke Event
            </a>

            <div class="mb-10">
                <span class="px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-bold">
                    Checkout Tiket
                </span>

                <h1 class="text-4xl md:text-5xl font-black text-slate-900 mt-5">
                    Selesaikan Pesanan Anda
                </h1>

                <p class="text-slate-500 mt-3">
                    Lengkapi data pemesan untuk mendapatkan e-ticket event.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Form Card -->
                <div
                    class="lg:col-span-2 bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-8">
                    <h3 class="text-2xl font-black text-slate-800 mb-2">
                        Data Pemesan
                    </h3>

                    <p class="text-slate-500 mb-8">
                        Pastikan data yang dimasukkan sudah benar.
                    </p>

                    <form action="{{ route('checkout.process', $event->id) }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">
                                Nama Lengkap
                            </label>

                            <input type="text" name="buyer_name" placeholder="Masukkan nama lengkap" required
                                class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">
                                    Email Aktif
                                </label>

                                <input type="email" name="buyer_email" placeholder="contoh@gmail.com" required
                                    class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition">

                                <p class="text-xs text-slate-400 mt-2">
                                    E-ticket akan dikirim ke email ini.
                                </p>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">
                                    No. WhatsApp
                                </label>

                                <input type="tel" name="buyer_phone" placeholder="08xxxxxxxxxx" required
                                    class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition">
                            </div>
                        </div>

                        <div class="bg-indigo-50 border border-indigo-100 rounded-2xl p-5">
                            <p class="font-bold text-indigo-700 mb-1">
                                Informasi Penting
                            </p>

                            <p class="text-sm text-slate-600">
                                Pastikan email dan nomor WhatsApp aktif agar tiket dapat diterima dengan benar.
                            </p>
                        </div>

                        <button type="submit"
                            class="block w-full py-5 bg-slate-900 text-white rounded-2xl font-black text-lg shadow-lg hover:bg-indigo-700 active:scale-95 transition-all text-center">
                            Bayar Sekarang
                        </button>

                        <p class="text-center text-xs text-slate-400">
                            Dengan melanjutkan pembayaran, Anda menyetujui Syarat & Ketentuan.
                        </p>
                    </form>
                </div>

                <!-- Summary Card -->
                <div class="bg-slate-900 text-white rounded-[2rem] p-7 shadow-2xl h-fit">
                    <h3 class="text-xl font-black mb-6">
                        Ringkasan Pesanan
                    </h3>

                    @if ($event->poster_path)
                        <img src="{{ asset('storage/' . $event->poster_path) }}" alt="{{ $event->title }}"
                            class="w-full h-44 rounded-3xl object-cover mb-5">
                    @else
                        <img src="{{ asset('assets/concert.png') }}" alt="{{ $event->title }}"
                            class="w-full h-44 rounded-3xl object-cover mb-5">
                    @endif

                    <h4 class="font-black text-xl leading-tight">
                        {{ $event->title }}
                    </h4>

                    <p class="text-slate-300 text-sm mt-2">
                        {{ $event->date ? $event->date->format('d M Y, H:i') : '-' }} • {{ $event->location }}
                    </p>

                    <div class="my-6 border-t border-white/10"></div>

                    <div class="space-y-4 text-sm">
                        <div class="flex justify-between text-slate-300">
                            <span>Harga Tiket</span>
                            <span>Rp {{ number_format($event->price, 0, ',', '.') }}</span>
                        </div>

                        <div class="flex justify-between text-slate-300">
                            <span>Biaya Layanan</span>
                            <span>Rp {{ number_format($serviceFee, 0, ',', '.') }}</span>
                        </div>

                        <div class="pt-4 border-t border-white/10 flex justify-between items-center">
                            <span class="font-bold">Total Bayar</span>
                            <span class="text-2xl font-black text-indigo-300">
                                Rp {{ number_format($total, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection