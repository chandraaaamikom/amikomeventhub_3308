@extends('layouts.admin')

@section('page-title', 'Tambah Kategori')
@section('page-subtitle', 'Tambahkan kategori baru untuk mengelompokkan event.')

@section('content')

    <div class="max-w-3xl">

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-4xl font-black text-slate-900">
                Tambah Kategori
            </h1>

            <p class="text-slate-500 font-medium mt-2">
                Isi data kategori event yang ingin ditambahkan.
            </p>
        </div>

        {{-- Error Validation --}}
        @if ($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-6 py-4 rounded-2xl font-bold text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- Form --}}
        <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm p-8">
            <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-black text-slate-700 mb-2 uppercase tracking-wide">
                        Nama Kategori
                    </label>

                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-600/10 transition font-semibold"
                        placeholder="Contoh: Seminar IT" required>

                    @error('name')
                        <p class="text-red-500 text-sm font-bold mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-black text-slate-700 mb-2 uppercase tracking-wide">
                        Slug
                    </label>

                    <input type="text" name="slug" value="{{ old('slug') }}"
                        class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-600/10 transition font-semibold"
                        placeholder="Contoh: seminar-it">

                    <p class="text-xs text-slate-400 font-medium mt-2">
                        Kosongkan jika ingin dibuat otomatis dari nama kategori.
                    </p>

                    @error('slug')
                        <p class="text-red-500 text-sm font-bold mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <button type="submit"
                        class="px-7 py-4 bg-indigo-600 text-white rounded-2xl font-black hover:bg-indigo-700 transition">
                        Simpan Kategori
                    </button>

                    <a href="{{ route('admin.categories.index') }}"
                        class="px-7 py-4 bg-slate-100 text-slate-700 rounded-2xl font-black hover:bg-slate-200 transition text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>

    </div>

@endsection