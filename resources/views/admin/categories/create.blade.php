@extends('layouts.admin')

@section('page-title', 'Tambah Kategori')
@section('page-subtitle', 'Tambahkan kategori event baru')

@section('content')

    <div class="max-w-3xl bg-white rounded-3xl shadow-sm border border-slate-100 p-8">

        <form action="{{ route('admin.categories.store') }}" method="POST">

            @csrf

            <div class="space-y-6">

                <div>
                    <label class="block font-bold mb-2">
                        Nama Kategori
                    </label>

                    <input type="text" name="name" placeholder="Masukkan nama kategori"
                        class="w-full border border-slate-200 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="flex gap-4">

                    <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold px-6 py-3 rounded-2xl transition">
                        Simpan
                    </button>

                    <a href="{{ route('admin.categories.index') }}"
                        class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold px-6 py-3 rounded-2xl transition">
                        Kembali
                    </a>

                </div>

            </div>

        </form>

    </div>

@endsection