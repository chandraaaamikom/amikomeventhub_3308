@extends('layouts.app')

@section('title', 'Detail Event - ' . $event->title)

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-slate-100 py-16">
        <main class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-3 gap-10">

            <div class="lg:col-span-1">
                <div class="sticky top-28 space-y-6">

                    @if ($event->poster_path)
                        <img src="{{ asset('storage/' . $event->poster_path) }}" alt="{{ $event->title }}"
                            class="w-full rounded-[2rem] shadow-2xl shadow-slate-300/70 border-8 border-white hover:scale-[1.02] transition duration-500">
                    @else
                        <img src="{{ asset('assets/concert.png') }}" alt="{{ $event->title }}"
                            class="w-full rounded-[2rem] shadow-2xl shadow-slate-300/70 border-8 border-white hover:scale-[1.02] transition duration-500">
                    @endif

                    <div class="bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-7">
                        <p class="text-sm font-bold text-indigo-600 mb-4 uppercase tracking-wider">
                            Kategori Event
                        </p>

                        <div class="flex items-center gap-4">
                            <div
                                class="w-14 h-14 bg-indigo-100 rounded-2xl flex items-center justify-center text-indigo-700 font-black">
                                {{ strtoupper(substr($event->category->name ?? 'E', 0, 2)) }}
                            </div>

                            <div>
                                <p class="font-black text-slate-800">
                                    {{ $event->category->name ?? 'Tanpa Kategori' }}
                                </p>
                                <p class="text-sm text-slate-500">
                                    AmikomEventHub
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 space-y-8">

                <div class="bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-8">
                    <span
                        class="inline-block px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-black uppercase tracking-wider">
                        {{ $event->category->name ?? 'Event' }}
                    </span>

                    <h1 class="text-4xl md:text-5xl font-black leading-tight text-slate-900 mt-5">
                        {{ $event->title }}
                    </h1>

                    <div class="flex flex-wrap gap-5 text-slate-500 font-medium mt-6">
                        <div class="flex items-center gap-2 bg-slate-50 px-4 py-3 rounded-2xl">
                            📅
                            <span>
                                {{ $event->date ? $event->date->format('d F Y, H:i') : '-' }}
                            </span>
                        </div>

                        <div class="flex items-center gap-2 bg-slate-50 px-4 py-3 rounded-2xl">
                            📍
                            <span>{{ $event->location }}</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-8">
                    <h3 class="text-2xl font-black text-slate-800 mb-4">
                        Deskripsi Event
                    </h3>

                    <p class="text-lg text-slate-600 leading-relaxed">
                        {{ $event->description }}
                    </p>
                </div>

                <div class="bg-slate-900 text-white rounded-[2rem] p-8 md:p-10 shadow-2xl relative overflow-hidden">
                    <div class="absolute -right-20 -top-20 w-64 h-64 bg-indigo-500 opacity-30 rounded-full blur-3xl"></div>
                    <div class="absolute -left-20 -bottom-20 w-64 h-64 bg-blue-500 opacity-20 rounded-full blur-3xl"></div>

                    <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-8">
                        <div>
                            <p class="text-indigo-300 font-bold uppercase tracking-widest text-sm mb-3">
                                Harga Tiket
                            </p>

                            <h2 class="text-4xl md:text-5xl font-black">
                                Rp {{ number_format($event->price, 0, ',', '.') }}
                                <span class="text-lg font-medium text-slate-300">/ orang</span>
                            </h2>

                            <p class="mt-5 text-slate-300 flex items-center gap-2">
                                Sisa stok:
                                <span class="font-black text-white underline underline-offset-4">
                                    {{ $event->stock }} Tiket lagi!
                                </span>
                            </p>
                        </div>

                        <a href="{{ route('checkout', ['event' => $event->id]) }}"
                            class="inline-block px-10 py-5 bg-white text-indigo-700 rounded-2xl font-black text-lg shadow-xl hover:bg-indigo-600 hover:text-white hover:scale-105 active:scale-95 transition-all text-center">
                            Pesan Sekarang
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-8">
                    <h3 class="text-2xl font-black text-slate-800 mb-6">
                        Kebijakan Tiket
                    </h3>

                    <ul class="space-y-4 text-slate-600">
                        <li class="flex items-start gap-3 bg-slate-50 p-4 rounded-2xl">
                            ✅ <span>E-Ticket akan dikirimkan otomatis setelah pembayaran berhasil.</span>
                        </li>

                        <li class="flex items-start gap-3 bg-slate-50 p-4 rounded-2xl">
                            ✅ <span>Tiket dapat discan di pintu masuk saat check-in.</span>
                        </li>

                        <li class="flex items-start gap-3 bg-rose-50 p-4 rounded-2xl text-rose-600">
                            ⚠️ <span>Tiket yang sudah dibeli tidak dapat direfund.</span>
                        </li>
                    </ul>
                </div>

            </div>
        </main>
    </div>
@endsection