@extends('layouts.app')

@section('title', 'Bantuan - AmikomEventHub')

@section('content')
    <section class="max-w-7xl mx-auto px-6 py-16">

        <div class="text-center mb-12">
            <span class="inline-block px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-black uppercase tracking-wider">
                Help Center
            </span>

            <h1 class="text-5xl font-black text-slate-900 mt-5">
                Pusat Bantuan
            </h1>

            <p class="text-slate-500 text-lg mt-3">
                Temukan jawaban dari pertanyaan umum tentang penggunaan AmikomEventHub.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8">
                <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center font-black text-xl mb-5">
                    1
                </div>

                <h3 class="text-2xl font-black text-slate-900 mb-3">
                    Bagaimana cara melihat event?
                </h3>

                <p class="text-slate-500 leading-relaxed">
                    Kamu dapat membuka halaman Katalog untuk melihat daftar event yang tersedia, lengkap dengan
                    informasi harga, lokasi, dan tanggal pelaksanaan.
                </p>
            </div>

            <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8">
                <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center font-black text-xl mb-5">
                    2
                </div>

                <h3 class="text-2xl font-black text-slate-900 mb-3">
                    Bagaimana cara memesan tiket?
                </h3>

                <p class="text-slate-500 leading-relaxed">
                    Pilih event yang ingin diikuti, klik tombol Detail, lalu lanjutkan ke halaman checkout untuk
                    mengisi data pemesanan.
                </p>
            </div>

            <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8">
                <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center font-black text-xl mb-5">
                    3
                </div>

                <h3 class="text-2xl font-black text-slate-900 mb-3">
                    Apakah pembayaran aman?
                </h3>

                <p class="text-slate-500 leading-relaxed">
                    Sistem dirancang untuk mendukung proses pembayaran online secara aman dan praktis melalui alur
                    checkout yang tersedia.
                </p>
            </div>

            <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8">
                <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center font-black text-xl mb-5">
                    4
                </div>

                <h3 class="text-2xl font-black text-slate-900 mb-3">
                    Siapa yang mengelola event?
                </h3>

                <p class="text-slate-500 leading-relaxed">
                    Event dikelola oleh admin penyelenggara melalui dashboard khusus yang dilindungi dengan sistem
                    login dan middleware.
                </p>
            </div>

        </div>

    </section>
@endsection