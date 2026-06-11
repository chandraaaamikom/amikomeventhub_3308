@extends('layouts.app')

@php
    use Illuminate\Support\Str;
@endphp

@section('title', 'Katalog - AmikomEventHub')

@section('content')

    <div class="bg-gradient-to-br from-indigo-50 via-white to-slate-100 min-h-screen">

        <main class="container mx-auto px-6 py-16">

            <div class="text-center mb-12">

                <span class="px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-black">
                    Event List
                </span>

                <h1 class="text-5xl font-black text-slate-900 mt-5">
                    Katalog Event
                </h1>

                <p class="text-slate-500 mt-3">
                    Pilih event menarik yang ingin kamu ikuti.
                </p>

                <form method="GET" action="{{ route('katalog') }}" class="mt-8 max-w-2xl mx-auto flex gap-3">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari event, lokasi, atau deskripsi..."
                        class="w-full px-5 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition">

                    <button type="submit"
                        class="px-6 py-4 bg-slate-900 text-white rounded-2xl font-bold hover:bg-indigo-700 transition">
                        Cari
                    </button>
                </form>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                @forelse ($events as $event)

                    <div
                        class="bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 overflow-hidden hover:scale-[1.03] transition duration-300">

                        @if ($event->poster_path)
                            <img src="{{ asset('storage/' . $event->poster_path) }}" alt="{{ $event->title }}"
                                class="w-full h-72 object-cover">
                        @else
                            <img src="/assets/concert.png" alt="{{ $event->title }}" class="w-full h-72 object-cover">
                        @endif

                        <div class="p-7">

                            <span
                                class="inline-block px-4 py-2 bg-indigo-100 text-indigo-700 rounded-xl text-xs font-black uppercase mb-4">
                                {{ $event->category->name ?? 'Tanpa Kategori' }}
                            </span>

                            <h2 class="text-2xl font-black text-slate-800">
                                {{ $event->title }}
                            </h2>

                            <p class="text-slate-500 mt-3">
                                {{ Str::limit($event->description, 90) }}
                            </p>

                            <div class="text-sm text-slate-500 mt-4">
                                📅 {{ $event->date ? $event->date->format('d M Y, H:i') : '-' }}
                            </div>

                            <div class="text-sm text-slate-500 mt-2">
                                📍 {{ $event->location ?? '-' }}
                            </div>

                            <div class="mt-6 flex justify-between items-center">

                                <span class="text-indigo-600 font-black">
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

                    <div class="col-span-3 text-center bg-white rounded-3xl p-10 shadow text-slate-500">
                        Belum ada event tersedia.
                    </div>

                @endforelse

            </div>

        </main>

    </div>

@endsection