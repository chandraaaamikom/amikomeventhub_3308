@extends('layouts.admin')

@section('title', 'Kelola Partner - AmikomEventHub')
@section('page-title', 'Kelola Partner')

@section('content')
    <div class="mb-10">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">
            <div>
                <h1 class="text-4xl font-black text-slate-900">
                    Kelola Partner
                </h1>
                <p class="text-slate-500 font-medium mt-2">
                    Menampilkan {{ $partners->total() }} partner
                </p>
            </div>

            <a href="{{ route('admin.partners.create') }}"
                class="px-6 py-4 bg-indigo-600 text-white rounded-2xl font-black shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition">
                + Tambah Partner
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-2xl font-bold">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">

        <div class="p-8 border-b border-slate-100">
            <form method="GET" action="{{ route('admin.partners.index') }}" class="flex gap-4">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari nama partner..."
                    class="w-full px-5 py-4 bg-white border-2 border-slate-100 rounded-2xl outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-600/10 transition font-semibold">

                <button type="submit"
                    class="px-7 py-4 bg-indigo-600 text-white rounded-2xl font-black hover:bg-indigo-700 transition">
                    Cari
                </button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                    <tr>
                        <th class="px-8 py-4">No</th>
                        <th class="px-8 py-4">Logo</th>
                        <th class="px-8 py-4">Nama Partner</th>
                        <th class="px-8 py-4">URL Logo</th>
                        <th class="px-8 py-4 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y border-t border-slate-100">
                    @forelse ($partners as $partner)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-8 py-6 text-slate-500 font-bold">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-8 py-6">
                                <div class="w-16 h-16 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center overflow-hidden">
                                    <img src="{{ $partner->logo_url }}"
                                        alt="{{ $partner->name }}"
                                        class="w-full h-full object-contain p-2"
                                        onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($partner->name) }}&background=6366f1&color=fff'">
                                </div>
                            </td>

                            <td class="px-8 py-6">
                                <p class="font-black text-slate-900">
                                    {{ $partner->name }}
                                </p>
                            </td>

                            <td class="px-8 py-6 text-slate-500 text-sm">
                                {{ $partner->logo_url }}
                            </td>

                            <td class="px-8 py-6">
                                <div class="flex justify-end gap-3">
                                    <a href="{{ route('admin.partners.edit', $partner->id) }}"
                                        class="px-4 py-2 bg-indigo-50 text-indigo-600 rounded-xl font-black hover:bg-indigo-600 hover:text-white transition">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus partner ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="px-4 py-2 bg-red-50 text-red-600 rounded-xl font-black hover:bg-red-600 hover:text-white transition">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-8 py-12 text-center">
                                <h3 class="text-xl font-black text-slate-900">
                                    Belum ada partner.
                                </h3>
                                <p class="text-slate-500 mt-2">
                                    Data partner akan muncul setelah ditambahkan.
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-8 border-t border-slate-100">
            {{ $partners->links() }}
        </div>

    </div>
@endsection