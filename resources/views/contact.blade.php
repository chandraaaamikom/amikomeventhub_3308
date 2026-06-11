@extends('layouts.app')

@section('title', 'Kontak - AmikomEventHub')

@section('content')
    <section class="max-w-7xl mx-auto px-6 py-16">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

            <div>
                <span class="inline-block px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-black uppercase tracking-wider">
                    Contact Us
                </span>

                <h1 class="text-5xl font-black text-slate-900 mt-5 leading-tight">
                    Hubungi Tim AmikomEventHub.
                </h1>

                <p class="text-slate-500 text-lg leading-relaxed mt-6">
                    Jika kamu memiliki pertanyaan tentang event, pemesanan tiket, atau kerja sama, silakan hubungi
                    kami melalui informasi kontak berikut.
                </p>

                <div class="space-y-5 mt-8">

                    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 flex items-center gap-5">
                        <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center font-black">
                            📧
                        </div>

                        <div>
                            <p class="text-slate-400 font-bold uppercase text-xs">Email</p>
                            <p class="font-black text-slate-900">chan</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 flex items-center gap-5">
                        <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center font-black">
                            📞
                        </div>

                        <div>
                            <p class="text-slate-400 font-bold uppercase text-xs">Telepon</p>
                            <p class="font-black text-slate-900">+62 812 3456 7890</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 flex items-center gap-5">
                        <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center font-black">
                            📍
                        </div>

                        <div>
                            <p class="text-slate-400 font-bold uppercase text-xs">Lokasi</p>
                            <p class="font-black text-slate-900">Universitas AMIKOM Yogyakarta</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="bg-white rounded-[2rem] border border-slate-100 shadow-xl p-8">
                <h2 class="text-3xl font-black text-slate-900 mb-6">
                    Kirim Pesan
                </h2>

                <form class="space-y-5">
                    <div>
                        <label class="block text-sm font-black text-slate-700 mb-2 uppercase tracking-wide">
                            Nama
                        </label>
                        <input type="text"
                            class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-600/10 transition font-semibold"
                            placeholder="Masukkan nama kamu">
                    </div>

                    <div>
                        <label class="block text-sm font-black text-slate-700 mb-2 uppercase tracking-wide">
                            Email
                        </label>
                        <input type="email"
                            class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-600/10 transition font-semibold"
                            placeholder="Masukkan email kamu">
                    </div>

                    <div>
                        <label class="block text-sm font-black text-slate-700 mb-2 uppercase tracking-wide">
                            Pesan
                        </label>
                        <textarea rows="5"
                            class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-600/10 transition font-semibold"
                            placeholder="Tulis pesan kamu"></textarea>
                    </div>

                    <button type="button"
                        class="w-full py-4 bg-indigo-600 text-white rounded-2xl font-black text-lg shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition">
                        Kirim Pesan
                    </button>
                </form>
            </div>

        </div>

    </section>
@endsection