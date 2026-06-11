@extends('layouts.app')

@php
    use Illuminate\Support\Str;

    $title = Str::lower($event->title);
    $poster = 'assets/concert.png';

    if (
        Str::contains($title, 'ai') ||
        Str::contains($title, 'ui') ||
        Str::contains($title, 'ux') ||
        Str::contains($title, 'seminar') ||
        Str::contains($title, 'workshop')
    ) {
        $poster = 'assets/workshop.png';
    } elseif (
        Str::contains($title, 'hackathon') ||
        Str::contains($title, 'coding') ||
        Str::contains($title, 'developer') ||
        Str::contains($title, 'e-sport') ||
        Str::contains($title, 'tournament')
    ) {
        $poster = 'assets/hackathon.png';
    } elseif (
        Str::contains($title, 'jazz') ||
        Str::contains($title, 'stand up') ||
        Str::contains($title, 'comedy') ||
        Str::contains($title, 'night') ||
        Str::contains($title, 'entertainment')
    ) {
        $poster = 'assets/concert.png';
    }
@endphp

@section('title', 'Detail Event - AmikomEventHub')

@section('content')
    <section class="max-w-7xl mx-auto px-6 py-16">

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 items-start">

            {{-- LEFT IMAGE --}}
            <div class="lg:col-span-2 space-y-8">
                <div class="bg-white rounded-[2rem] p-4 shadow-2xl shadow-slate-200/70 border border-slate-100">
                    <img src="{{ asset($poster) }}"
                        alt="{{ $event->title }}"
                        class="w-full aspect-[3/4] object-cover rounded-[1.5rem]">
                </div>

                <div class="bg-white rounded-[2rem] p-7 shadow-xl border border-slate-100">
                    <p class="text-sm font-black text-slate-500 uppercase tracking-wide mb-4">
                        Penyelenggara
                    </p>

                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-indigo-100 text-indigo-600 rounded-2xl flex items-center justify-center font-black text-xl">
                            AH
                        </div>

                        <div>
                            <h3 class="font-black text-slate-900 text-lg">
                                AmikomEventHub
                            </h3>
                            <p class="text-slate-500 text-sm">
                                Verified Organizer
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- RIGHT CONTENT --}}
            <div class="lg:col-span-3">

                <span class="inline-block px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-black uppercase tracking-wider mb-5">
                    {{ $event->category->name ?? 'Event' }}
                </span>

                <h1 class="text-5xl md:text-6xl font-black text-slate-900 leading-tight mb-6">
                    {{ $event->title }}
                </h1>

                <div class="flex flex-wrap gap-6 text-slate-500 text-lg font-semibold mb-10">
                    <div class="flex items-center gap-2">
                        <span class="text-indigo-600">📅</span>
                        <span>
                            {{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d F Y, H:i') : '-' }}
                        </span>
                    </div>

                    <div class="flex items-center gap-2">
                        <span class="text-indigo-600">📍</span>
                        <span>
                            {{ $event->location ?? '-' }}
                        </span>
                    </div>
                </div>

                <div class="mb-10">
                    <h2 class="text-3xl font-black text-slate-900 mb-4">
                        Deskripsi Event
                    </h2>

                    <p class="text-slate-600 text-lg leading-relaxed">
                        {{ $event->description }}
                    </p>
                </div>

                <div class="bg-indigo-600 rounded-[2rem] p-8 md:p-10 text-white shadow-2xl shadow-indigo-200 relative overflow-hidden">
                    <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-8">

                        <div>
                            <p class="text-indigo-100 font-black uppercase tracking-widest mb-3">
                                Harga Tiket
                            </p>

                            <div class="flex items-end gap-2">
                                <h3 class="text-5xl md:text-6xl font-black">
                                    Rp {{ number_format($event->price, 0, ',', '.') }}
                                </h3>
                                <span class="text-indigo-100 font-bold mb-2">
                                    / orang
                                </span>
                            </div>

                            <p class="text-indigo-100 font-semibold mt-4">
                                Sisa stok:
                                <span class="font-black underline">
                                    {{ $event->stock }} tiket lagi
                                </span>
                            </p>
                        </div>

                        <a href="{{ route('checkout', ['event' => $event->id]) }}"
                            class="px-10 py-5 bg-white text-indigo-600 rounded-2xl font-black text-xl shadow-xl hover:bg-indigo-50 transition text-center">
                            Pesan Sekarang
                        </a>

                    </div>

                    <div class="absolute -right-20 -bottom-20 w-80 h-80 bg-white/10 rounded-full"></div>
                </div>

            </div>
        </div>

    </section>
@endsection