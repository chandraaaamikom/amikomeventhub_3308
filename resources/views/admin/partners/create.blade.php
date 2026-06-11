@extends('layouts.admin')

@section('title', 'Tambah Partner - AmikomEventHub')
@section('page-title', 'Tambah Partner')

@section('content')
    <div class="max-w-3xl">

        <div class="mb-8">
            <h1 class="text-4xl font-black text-slate-900">
                Tambah Partner
            </h1>
            <p class="text-slate-500 font-medium mt-2">
                Tambahkan partner baru untuk ditampilkan di halaman utama.
            </p>
        </div>

        <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm p-8">
            <form action="{{ route('admin.partners.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-black text-slate-700 mb-2 uppercase tracking-wide">
                        Nama Partner
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-600/10 transition font-semibold"
                        placeholder="Contoh: AMIKOM Creative Center" required>

                    @error('name')
                        <p class="text-red-500 text-sm font-bold mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-black text-slate-700 mb-2 uppercase tracking-wide">
                        URL Logo
                    </label>
                    <input type="text" name="logo_url" value="{{ old('logo_url') }}"
                        class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-600/10 transition font-semibold"
                        placeholder="https://example.com/logo.png" required>

                    @error('logo_url')
                        <p class="text-red-500 text-sm font-bold mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit"
                        class="px-7 py-4 bg-indigo-600 text-white rounded-2xl font-black hover:bg-indigo-700 transition">
                        Simpan Partner
                    </button>

                    <a href="{{ route('admin.partners.index') }}"
                        class="px-7 py-4 bg-slate-100 text-slate-700 rounded-2xl font-black hover:bg-slate-200 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>

    </div>
@endsection