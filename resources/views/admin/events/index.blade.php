@extends('layouts.admin')

@php
    use Illuminate\Support\Str;
@endphp

@section('page-title', 'Kelola Event')
@section('page-subtitle', 'Buat dan atur acara seru Anda di sini.')

@section('content')

{{-- Notifikasi sukses --}}
@if(session('success'))
    <div class="bg-green-100 text-green-700 px-6 py-4 rounded-2xl mb-6 font-semibold text-sm">
        ✅ {{ session('success') }}
    </div>
@endif

<div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        @if(request('search'))
            <p class="text-slate-500 font-medium">
                Hasil pencarian untuk:
                <span class="font-black text-indigo-600">"{{ request('search') }}"</span>
            </p>
        @else
            <p class="text-slate-500 font-medium">
                Menampilkan daftar event yang tersedia.
            </p>
        @endif
    </div>

    <a href="{{ route('admin.events.create') }}"
        class="inline-block px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 active:scale-95 transition text-center">
        + Tambah Event Baru
    </a>
</div>

{{-- Search Bar --}}
<div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm p-6 mb-8">
    <form method="GET" action="{{ route('admin.events.index') }}" class="flex flex-col md:flex-row gap-4">
        <input type="text" name="search" value="{{ request('search') }}"
            placeholder="Cari event, kategori, lokasi, atau deskripsi..."
            class="w-full px-5 py-4 bg-white border-2 border-slate-100 rounded-2xl outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-600/10 transition font-semibold">

        <button type="submit"
            class="px-7 py-4 bg-indigo-600 text-white rounded-2xl font-black hover:bg-indigo-700 transition">
            Cari
        </button>

        @if(request('search'))
            <a href="{{ route('admin.events.index') }}"
                class="px-7 py-4 bg-slate-100 text-slate-700 rounded-2xl font-black hover:bg-slate-200 transition text-center">
                Reset
            </a>
        @endif
    </form>
</div>

<div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                <tr>
                    <th class="px-8 py-4 w-16">No</th>
                    <th class="px-8 py-4">Poster</th>
                    <th class="px-8 py-4">Event</th>
                    <th class="px-8 py-4">Harga / Stok</th>
                    <th class="px-8 py-4">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y border-t">
                @forelse($events as $index => $event)

                    @php
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

                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="px-8 py-6 font-bold text-slate-400">
                            {{ $events->firstItem() + $index }}
                        </td>

                        <td class="px-8 py-6">
                            <img src="{{ asset($poster) }}"
                                alt="{{ $event->title }}"
                                class="w-16 h-20 rounded-xl object-cover shadow-sm">
                        </td>

                        <td class="px-8 py-6">
                            <p class="font-black text-slate-800">
                                {{ $event->title }}
                            </p>

                            <p class="text-xs text-slate-400">
                                {{ $event->category->name ?? '-' }} •
                                {{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d M Y, H:i') : '-' }}
                            </p>

                            <p class="text-xs text-slate-400 mt-1">
                                📍 {{ $event->location }}
                            </p>
                        </td>

                        <td class="px-8 py-6">
                            <p class="font-bold text-indigo-600">
                                Rp {{ number_format($event->price, 0, ',', '.') }}
                            </p>

                            <p class="text-xs text-slate-400">
                                Stok: {{ $event->stock }}
                            </p>
                        </td>

                        <td class="px-8 py-6">
                            <div class="flex gap-2">
                                {{-- Tombol Edit --}}
                                <a href="{{ route('admin.events.edit', $event->id) }}"
                                    class="p-2.5 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </a>

                                {{-- Tombol Hapus --}}
                                <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus event ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="p-2.5 bg-rose-50 text-rose-600 rounded-xl hover:bg-rose-600 hover:text-white transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-8 py-12 text-center text-slate-400 font-medium">
                            @if(request('search'))
                                Event dengan kata kunci "{{ request('search') }}" tidak ditemukan.
                            @else
                                Belum ada event. Klik tombol "Tambah Event Baru" untuk memulai.
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="px-8 py-5 bg-slate-50/50 border-t">
        {{ $events->links() }}
    </div>
</div>

@endsection