@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<section class="max-w-4xl mx-auto px-6 py-16">
    <div class="bg-white rounded-3xl shadow-lg border border-slate-200 p-8">
        <div class="flex items-center gap-6 mb-8">
            <div class="w-24 h-24 bg-indigo-600 rounded-3xl flex items-center justify-center text-white text-3xl font-bold shadow-lg">
                CP
            </div>
            <div>
                <h1 class="text-3xl font-bold text-slate-900">
                    Profil Praktikan
                </h1>
                <p class="text-slate-500 mt-2">
                    Informasi data mahasiswa praktikan AmikomEventHub
                </p>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200">
                <h2 class="text-sm font-semibold text-slate-500 uppercase mb-2">
                    Nama
                </h2>
                <p class="text-lg font-medium text-slate-900">
                    Chandra Pratama Wahana Putra
                </p>
            </div>

            <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200">
                <h2 class="text-sm font-semibold text-slate-500 uppercase mb-2">
                    NIM
                </h2>
                <p class="text-lg font-medium text-slate-900">
                    24.12.3308
                </p>
            </div>

            <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200 md:col-span-2">
                <h2 class="text-sm font-semibold text-slate-500 uppercase mb-2">
                    Jurusan
                </h2>
                <p class="text-lg font-medium text-slate-900">
                    Sistem Informasi
                </p>
            </div>
        </div>
    </div>
</section>
@endsection