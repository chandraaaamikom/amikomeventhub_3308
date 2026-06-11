@extends('layouts.app')

@php
    use Illuminate\Support\Str;
@endphp

@section('title', 'Katalog - AmikomEventHub')

@section('content')
    <section class="max-w-7xl mx-auto px-6 py-16">

        {{-- HEADER --}}
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-black uppercase tracking-wider">
                Event List
            </span>

            <h1 class="text-5xl font-black text-slate-900 mt-5">
                Katalog Event
            </h1>

            <p class="text-slate-500 mt-3 text-lg">
                Pilih event menarik yang ingin kamu ikuti.
            </p>

            {{-- SEARCH --}}
            <form method="GET" action="{{ route('katalog') }}" class="mt-8 max-w-2xl mx-auto flex gap-3">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari event, lokasi, atau deskripsi..."
                    class="w-full px-5 py-4 bg-white border-2 border-slate-100 rounded-2xl outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-600/10 transition font-semibold shadow-sm">

                <button type="submit"
                    class="px-7 py-4 bg-indigo-600 text-white rounded-2xl font-black shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition">
                    Cari
                </button>
            </form>
        </div>

        {{-- GRID EVENT --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse ($events as $event)
                <div class="group bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-2xl transition-all duration-300 overflow-hidden">

                    {{-- POSTER --}}
                    <div class="relative overflow-hidden aspect-[3/4] bg-slate-100">

                        @php
                            $title = Str::lower($event->title);
                            $poster = 'assets/concert.png';

                            if (Str::contains($title, 'ai') || Str::contains($title, 'ui') || Str::contains($title, 'ux') || Str::contains($title, 'seminar')) {
                                $poster = 'assets/workshop.png';
                            } elseif (Str::contains($title, 'hackathon') || Str::contains($title, 'coding') || Str::contains($title, 'developer') || Str::contains($title, 'e-sport')) {
                                $poster = 'assets/hackathon.png';
                            } elseif (Str::contains($title, 'jazz') || Str::contains($title, 'stand up') || Str::contains($title, 'comedy') || Str::contains($title, 'night')) {
                                $poster = 'assets/concert.png';
                            }
                        @endphp

                        <img src="{{ asset($poster) }}"
                            alt="{{ $event->title }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">

                        <div class="absolute top-4 left-4 px-3 py-1 bg-white/90 backdrop-blur rounded-lg text-xs font-bold uppercase text-indigo-600">
                            {{ $event->category->name ?? 'Tanpa Kategori' }}
                        </div>
                    </div>

                    {{-- BODY --}}
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 group-hover:text-indigo-600 transition">
                            {{ $event->title }}
                        </h3>

                        <p class="text-slate-500 text-sm leading-relaxed mb-4">
                            {{ Str::limit($event->description, 90) }}
                        </p>

                        <div class="space-y-2 text-slate-500 text-sm mb-5">
                            <div class="flex items-center gap-2">
                                <span>🕒</span>
                                <span>
                                    {{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d M Y, H:i') : '-' }}
                                </span>
                            </div>

                            <div class="flex items-center gap-2">
                                <span>📍</span>
                                <span>
                                    {{ $event->location ?? '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center pt-4 border-t border-slate-100">
                            <span class="text-2xl font-black text-indigo-600">
                                Rp {{ number_format($event->price, 0, ',', '.') }}
                            </span>

                            <a href="{{ route('events.show', ['event' => $event->id]) }}"
                                class="px-5 py-2 bg-indigo-50 text-indigo-600 rounded-xl font-bold hover:bg-indigo-600 hover:text-white transition">
                                Detail
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-12 text-center">
                        <h3 class="text-2xl font-black text-slate-900">
                            Belum ada event tersedia.
                        </h3>

                        <p class="text-slate-500 mt-2">
                            Data event belum ditambahkan oleh admin.
                        </p>
                    </div>
                </div>
            @endforelse

        </div>

    </section>
@endsection