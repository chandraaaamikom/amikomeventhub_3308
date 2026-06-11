@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
<section class="max-w-4xl mx-auto px-6 py-16">
    <div class="bg-white rounded-3xl shadow-lg border border-slate-200 p-8">
        <h1 class="text-3xl font-bold text-slate-900 mb-6">
            Hubungi Kami
        </h1>

        <p class="text-slate-600 mb-8">
            Jika ada pertanyaan, kendala reservasi tiket, atau ingin bekerja sama dengan AmikomEventHub, hubungi kami melalui informasi berikut.
        </p>

        <div class="grid md:grid-cols-2 gap-6">
            <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200">
                <h2 class="text-lg font-semibold mb-2">Email</h2>
                <p class="text-slate-600">chandrapratamwp@email.com</p>
            </div>

            <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200">
                <h2 class="text-lg font-semibold mb-2">Telepon</h2>
                <p class="text-slate-600">+62 812 3456 7890</p>
            </div>

            <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200 md:col-span-2">
                <h2 class="text-lg font-semibold mb-2">Alamat</h2>
                <p class="text-slate-600">
                    Universitas Amikom Yogyakarta, Sleman, Daerah Istimewa Yogyakarta
                </p>
            </div>
        </div>
    </div>
</section>
@endsection