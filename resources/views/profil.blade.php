@extends('layouts.app')

@section('title', 'Profil - AmikomEventHub')

@section('content')
    <section class="max-w-7xl mx-auto px-6 py-16">

        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-[2rem] border border-slate-200 shadow-xl shadow-slate-200/60 p-8 md:p-10">

                <div class="flex flex-col md:flex-row md:items-center gap-6 mb-10">
                    <div class="w-28 h-28 bg-indigo-600 text-white rounded-[1.7rem] flex items-center justify-center font-black text-4xl shadow-lg shadow-indigo-200">
                        CP
                    </div>

                    <div>
                        <h1 class="text-4xl font-black text-slate-900">
                            Profil Praktikan
                        </h1>

                        <p class="text-slate-500 text-lg mt-2">
                            Informasi data mahasiswa praktikan AmikomEventHub
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6">
                        <p class="text-sm font-black text-slate-500 uppercase tracking-wide mb-3">
                            Nama
                        </p>

                        <p class="text-xl font-semibold text-slate-900">
                            Chandra Pratama Wahana Putra
                        </p>
                    </div>

                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6">
                        <p class="text-sm font-black text-slate-500 uppercase tracking-wide mb-3">
                            NIM
                        </p>

                        <p class="text-xl font-semibold text-slate-900">
                            24.12.3308
                        </p>
                    </div>

                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 md:col-span-2">
                        <p class="text-sm font-black text-slate-500 uppercase tracking-wide mb-3">
                            Jurusan
                        </p>

                        <p class="text-xl font-semibold text-slate-900">
                            Sistem Informasi
                        </p>
                    </div>

                </div>

            </div>
        </div>

    </section>
@endsection