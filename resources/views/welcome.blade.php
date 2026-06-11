@extends('layouts.app')

@php
    use Illuminate\Support\Str;
@endphp

@section('title', 'Home - AmikomEventHub')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-slate-100">

        <!-- Hero Section -->
        <section class="max-w-7xl mx-auto px-6 py-20 grid grid-cols-1 lg:grid-cols-2 items-center gap-14">

            <div class="space-y-8">
                <span
                    class="inline-block px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-black uppercase tracking-wider">
                    #1 Event Platform
                </span>

                <h1 class="text-5xl md:text-7xl font-black leading-tight text-slate-900">
                    Temukan & Pesan
                    <span class="text-indigo-600">Tiket Event</span>
                    Impianmu.
                </h1>

                <p class="text-lg text-slate-500 max-w-xl leading-relaxed">
                    Dari konser musik hingga workshop teknologi, semua ada di genggamanmu.
                    Pesan tiket event favoritmu dengan mudah, cepat, dan aman.
                </p>

                <div class="flex flex-wrap gap-4">
                    <a href="#events"
                        class="px-8 py-4 bg-slate-900 text-white rounded-2xl font-black text-lg shadow-xl hover:bg-indigo-700 hover:scale-105 active:scale-95 transition-all">
                        Mulai Jelajah
                    </a>

                    <a href="{{ route('katalog') }}"
                        class="px-8 py-4 bg-white border border-slate-200 rounded-2xl font-black text-lg text-slate-700 hover:border-indigo-600 hover:text-indigo-600 hover:shadow-lg transition-all">
                        Lihat Katalog
                    </a>
                </div>

                <div class="grid grid-cols-3 gap-4 max-w-lg pt-4">
                    <div class="bg-white rounded-2xl border border-slate-200 p-4 shadow-sm">
                        <p class="text-2xl font-black text-indigo-600">{{ $events->count() }}+</p>
                        <p class="text-xs text-slate-500 font-bold">Event</p>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-200 p-4 shadow-sm">
                        <p class="text-2xl font-black text-indigo-600">{{ $categories->count() }}+</p>
                        <p class="text-xs text-slate-500 font-bold">Kategori</p>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-200 p-4 shadow-sm">
                        <p class="text-2xl font-black text-indigo-600">{{ $partners->count() }}+</p>
                        <p class="text-xs text-slate-500 font-bold">Partner</p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -top-10 -left-10 w-72 h-72 bg-indigo-300 rounded-full blur-3xl opacity-30"></div>
                <div class="absolute -bottom-10 -right-10 w-72 h-72 bg-pink-300 rounded-full blur-3xl opacity-30"></div>

                <img src="/assets/concert.png" alt="Concert"
                    class="relative z-10 w-full rounded-[2.5rem] shadow-2xl shadow-slate-300/70 object-cover aspect-[4/5] border-8 border-white">

                <div
                    class="absolute -bottom-6 left-6 right-6 md:left-[-1.5rem] md:right-auto z-20 bg-white/90 backdrop-blur-xl p-6 rounded-3xl shadow-2xl border border-white">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center text-green-600">
                            ✓
                        </div>

                        <div>
                            <p class="text-xs text-slate-500 font-black uppercase tracking-wider">
                                Terverifikasi
                            </p>
                            <p class="font-black text-slate-800">
                                Pembayaran Aman
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Category Section -->
        <section class="max-w-7xl mx-auto px-6 py-10">
            <div class="text-center mb-10">
                <span
                    class="inline-block px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-black uppercase tracking-wider mb-4">
                    Kategori Event
                </span>

                <h2 class="text-4xl font-black text-slate-900">
                    Jelajahi Berdasarkan Kategori
                </h2>

                <p class="text-slate-500 mt-3">
                    Pilih kategori event yang sesuai dengan minatmu.
                </p>
            </div>

            <div class="flex flex-wrap justify-center gap-4">
                @forelse ($categories as $category)
                    <div
                        class="px-6 py-4 bg-white border border-slate-200 rounded-2xl shadow-md hover:shadow-xl hover:scale-105 transition">
                        <p class="font-black text-indigo-600">
                            {{ $category->name }}
                        </p>
                    </div>
                @empty
                    <p class="text-slate-500">
                        Belum ada kategori tersedia.
                    </p>
                @endforelse
            </div>
        </section>

        <!-- Events Grid -->
        <section id="events" class="max-w-7xl mx-auto px-6 py-20">
            <div class="flex flex-col md:flex-row md:justify-between md:items-end gap-6 mb-12">
                <div>
                    <span class="inline-block px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-black mb-4">
                        Event Pilihan
                    </span>

                    <h2 class="text-4xl font-black text-slate-900 mb-2">
                        Event Terdekat
                    </h2>

                    <p class="text-slate-500 font-medium">
                        Jangan sampai ketinggalan acara seru minggu ini!
                    </p>
                </div>

                <a href="{{ route('katalog') }}"
                    class="px-5 py-3 bg-white border border-slate-200 rounded-2xl font-bold text-slate-700 hover:border-indigo-600 hover:text-indigo-600 hover:shadow-lg transition">
                    Semua Event
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @forelse ($events as $event)
                    <div
                        class="group bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 overflow-hidden hover:scale-[1.03] transition duration-300">

                        <div class="relative overflow-hidden aspect-[3/4]">
                            @if ($event->poster_path)
                                <img src="{{ asset('storage/' . $event->poster_path) }}" alt="{{ $event->title }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <img src="/assets/concert.png" alt="{{ $event->title }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @endif

                            <div
                                class="absolute top-4 left-4 px-4 py-2 bg-white/90 backdrop-blur rounded-xl text-xs font-black uppercase text-indigo-600">
                                {{ $event->category->name ?? 'Event' }}
                            </div>
                        </div>

                        <div class="p-7">
                            <h3 class="text-2xl font-black text-slate-800 mb-3 group-hover:text-indigo-600 transition">
                                {{ $event->title }}
                            </h3>

                            <p class="text-slate-500 mb-5">
                                {{ Str::limit($event->description, 80) }}
                            </p>

                            <div class="flex items-center gap-2 text-slate-500 text-sm mb-6">
                                <span>
                                    {{ $event->date ? $event->date->format('d F Y, H:i') : '-' }}
                                </span>
                            </div>

                            <div class="flex justify-between items-center pt-5 border-t border-slate-100">
                                <span class="text-2xl font-black text-indigo-600">
                                    Rp {{ number_format($event->price, 0, ',', '.') }}
                                </span>

                                <a href="{{ route('events.show', $event->id) }}"
                                    class="px-5 py-3 bg-slate-900 text-white rounded-xl font-bold hover:bg-indigo-700 transition">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center text-slate-500">
                        Belum ada event tersedia.
                    </div>
                @endforelse

            </div>
        </section>

        <!-- Partner Section -->
        <section class="max-w-7xl mx-auto px-6 py-20">
            <div class="text-center mb-14">
                <span
                    class="inline-block px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-black uppercase tracking-wider mb-4">
                    Trusted Partner
                </span>

                <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-4">
                    Partner Kami
                </h2>

                <p class="text-slate-500 max-w-2xl mx-auto">
                    Berbagai partner terpercaya yang mendukung event-event terbaik di AmikomEventHub.
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                @forelse ($partners as $partner)
                    <div
                        class="bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-8 hover:scale-105 transition duration-300 text-center">
                        <div class="w-24 h-24 mx-auto mb-5">
                            <img src="{{ $partner->logo_url }}" alt="{{ $partner->name }}"
                                class="w-full h-full object-contain rounded-2xl">
                        </div>

                        <h3 class="font-black text-slate-800 text-lg">
                            {{ $partner->name }}
                        </h3>
                    </div>
                @empty
                    <div class="col-span-4 text-center text-slate-500">
                        Belum ada partner tersedia.
                    </div>
                @endforelse
            </div>
        </section>

    </div>
@endsection