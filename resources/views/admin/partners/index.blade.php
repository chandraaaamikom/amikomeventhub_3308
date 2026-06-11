@extends('layouts.admin')

@section('title', 'Data Partner')

@section('content')
    <div class="min-h-screen bg-slate-100 px-6 py-12">
        <div class="max-w-6xl mx-auto bg-white rounded-3xl shadow-xl p-8">

            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-black">Data Partner</h1>

                <a href="{{ route('admin.partners.create') }}"
                    class="px-5 py-3 bg-indigo-600 text-white rounded-2xl font-bold">
                    Tambah Partner
                </a>
            </div>

            <form method="GET" class="mb-6">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari partner..."
                    class="w-full border border-slate-200 p-4 rounded-2xl">
            </form>

            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="p-4 text-left">ID</th>
                        <th class="p-4 text-left">Logo</th>
                        <th class="p-4 text-left">Nama</th>
                        <th class="p-4 text-left">Dibuat</th>
                        <th class="p-4 text-left">Diupdate</th>
                        <th class="p-4 text-left">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($partners as $partner)
                        <tr class="border-b">
                            <td class="p-4">{{ $partner->id }}</td>

                            <td class="p-4">
                                @if ($partner->logo_url)
                                    <img src="{{ $partner->logo_url }}" class="w-16 h-16 rounded-xl object-cover">
                                @else
                                    <span class="text-slate-400">Tidak ada logo</span>
                                @endif
                            </td>

                            <td class="p-4 font-bold">{{ $partner->name }}</td>
                            <td class="p-4">{{ $partner->created_at }}</td>
                            <td class="p-4">{{ $partner->updated_at }}</td>

                            <td class="p-4 flex gap-2">
                                <a href="{{ route('admin.partners.edit', $partner->id) }}"
                                    class="px-4 py-2 bg-yellow-500 text-white rounded-xl">
                                    Edit
                                </a>

                                <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="px-4 py-2 bg-red-500 text-white rounded-xl"
                                        onclick="return confirm('Yakin ingin hapus partner ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-6 text-center text-slate-500">
                                Data partner belum ada.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
@endsection