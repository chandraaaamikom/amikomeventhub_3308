@extends('layouts.app')

@section('title', 'Bantuan')

@section('content')
<section class="max-w-4xl mx-auto px-6 py-16">
    <div class="bg-white rounded-3xl shadow-lg border border-slate-200 p-8">
        <h1 class="text-3xl font-bold text-slate-900 mb-4">
            Bantuan
        </h1>

        <p class="text-slate-600 mb-8">
            Temukan informasi bantuan seputar penggunaan AmikomEventHub.
        </p>

        <div class="space-y-4">
            <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200">
                <h2 class="text-lg font-semibold text-slate-900 mb-2">
                    Apa itu website ini?
                </h2>
                <p class="text-slate-600">
                    Website ini digunakan untuk melihat dan melakukan reservasi tiket event.
                </p>
            </div>

            <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200">
                <h2 class="text-lg font-semibold text-slate-900 mb-2">
                    Cara daftar event?
                </h2>
                <p class="text-slate-600">
                    Pilih event yang tersedia di halaman katalog, lalu lanjutkan ke proses checkout atau reservasi.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection