@extends('layouts.admin')

@section('page-title', 'Manajemen Kategori')
@section('page-subtitle', 'Kelola kategori event yang tersedia di platform')

@section('content')

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-6 py-4 rounded-2xl mb-6 font-semibold text-sm">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Action Bar --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
        <div>
            @if(request('search'))
                <p class="text-slate-500 text-sm">
                    Hasil pencarian untuk:
                    <span class="font-bold text-indigo-600">"{{ request('search') }}"</span>
                </p>
            @else
                <p class="text-slate-500 text-sm">
                    Menampilkan
                    <span class="font-bold text-slate-700">{{ $categories->total() }}</span>
                    kategori
                </p>
            @endif
        </div>

        <a href="{{ route('admin.categories.create') }}"
            class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-5 py-3 rounded-xl transition text-sm text-center">
            + Tambah Kategori
        </a>
    </div>

    {{-- Search Bar --}}
    <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm p-6 mb-8">
        <form method="GET" action="{{ route('admin.categories.index') }}" class="flex flex-col md:flex-row gap-4">
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Cari nama kategori atau slug..."
                class="w-full px-5 py-4 bg-white border-2 border-slate-100 rounded-2xl outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-600/10 transition font-semibold">

            <button type="submit"
                class="px-7 py-4 bg-indigo-600 text-white rounded-2xl font-black hover:bg-indigo-700 transition">
                Cari
            </button>

            @if(request('search'))
                <a href="{{ route('admin.categories.index') }}"
                    class="px-7 py-4 bg-slate-100 text-slate-700 rounded-2xl font-black hover:bg-slate-200 transition text-center">
                    Reset
                </a>
            @endif
        </form>
    </div>

    {{-- Categories Table --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 text-slate-500 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-4 text-left">No</th>
                        <th class="px-6 py-4 text-left">Nama Kategori</th>
                        <th class="px-6 py-4 text-left">Slug</th>
                        <th class="px-6 py-4 text-left">Jumlah Event</th>
                        <th class="px-6 py-4 text-left">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse($categories as $index => $category)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 text-slate-400 font-bold">
                                {{ $categories->firstItem() + $index }}
                            </td>

                            <td class="px-6 py-4">
                                <span class="bg-indigo-100 text-indigo-700 text-xs font-bold px-3 py-1 rounded-full">
                                    {{ $category->name }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-slate-500">
                                {{ $category->slug ?? '-' }}
                            </td>

                            <td class="px-6 py-4 text-slate-500">
                                {{ $category->events_count ?? 0 }} event
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                                        class="text-xs bg-amber-100 text-amber-700 font-bold px-3 py-1 rounded-lg hover:bg-amber-200 transition">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="text-xs bg-red-100 text-red-600 font-bold px-3 py-1 rounded-lg hover:bg-red-200 transition">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-slate-400 font-medium">
                                @if(request('search'))
                                    Kategori dengan kata kunci "{{ request('search') }}" tidak ditemukan.
                                @else
                                    Belum ada kategori. Klik tombol "Tambah Kategori" untuk memulai.
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="px-6 py-5 bg-slate-50/50 border-t">
            {{ $categories->links() }}
        </div>
    </div>

@endsection