@extends('layouts.admin')

@section('page-title', 'Manajemen Kategori')
@section('page-subtitle', 'Kelola kategori event yang tersedia di platform')

@section('content')

    {{-- Action Bar --}}
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">

        <form method="GET" action="{{ route('admin.categories.index') }}" class="flex gap-3">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kategori..."
                class="border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">

            <button
                class="bg-slate-800 hover:bg-slate-900 text-white font-semibold px-5 py-2.5 rounded-xl transition text-sm">
                Search
            </button>
        </form>

        <a href="{{ route('admin.categories.create') }}"
            class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-5 py-2.5 rounded-xl transition text-sm">
            + Tambah Kategori
        </a>
    </div>

    <p class="text-slate-500 text-sm mb-4">
        Menampilkan <span class="font-bold text-slate-700">{{ $categories->count() }}</span> kategori
    </p>

    {{-- Categories Table --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 uppercase text-xs tracking-wider">
                <tr>
                    <th class="px-6 py-3 text-left">No</th>
                    <th class="px-6 py-3 text-left">Nama Kategori</th>
                    <th class="px-6 py-3 text-left">Slug</th>
                    <th class="px-6 py-3 text-left">Jumlah Event</th>
                    <th class="px-6 py-3 text-left">Created At</th>
                    <th class="px-6 py-3 text-left">Updated At</th>
                    <th class="px-6 py-3 text-left">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">
                @forelse ($categories as $category)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4 text-slate-400">
                            {{ $loop->iteration }}
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
                            {{ $category->events_count ?? $category->events->count() }} event
                        </td>

                        <td class="px-6 py-4 text-slate-500">
                            {{ $category->created_at }}
                        </td>

                        <td class="px-6 py-4 text-slate-500">
                            {{ $category->updated_at }}
                        </td>

                        <td class="px-6 py-4 flex gap-2">
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
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-slate-500">
                            Data kategori belum tersedia.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection