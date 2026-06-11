@extends('layouts.app')

@section('title', 'Checkout - AmikomEventHub')

@section('content')
    <section class="max-w-7xl mx-auto px-6 py-16">

        <div class="mb-8">
            <a href="{{ route('events.show', ['event' => $event->id]) }}"
                class="inline-flex items-center gap-2 text-indigo-600 font-black hover:text-indigo-800 transition">
                ← Kembali ke Detail Event
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- FORM CHECKOUT --}}
            <div class="lg:col-span-2 bg-white rounded-[2rem] border border-slate-100 shadow-xl p-8">

                <span class="inline-block px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-black uppercase tracking-wider mb-5">
                    Checkout Ticket
                </span>

                <h1 class="text-4xl font-black text-slate-900 mb-3">
                    Lengkapi Data Pemesanan
                </h1>

                <p class="text-slate-500 mb-8">
                    Isi data pembeli untuk melanjutkan proses pemesanan tiket.
                </p>

                <form action="{{ route('checkout.process', ['event' => $event->id]) }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-sm font-black text-slate-700 mb-2 uppercase tracking-wide">
                            Nama Pembeli
                        </label>
                        <input type="text" name="buyer_name" value="{{ old('buyer_name') }}"
                            class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-600/10 transition font-semibold"
                            placeholder="Masukkan nama lengkap" required>
                        @error('buyer_name')
                            <p class="text-red-500 text-sm font-bold mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-black text-slate-700 mb-2 uppercase tracking-wide">
                            Email
                        </label>
                        <input type="email" name="buyer_email" value="{{ old('buyer_email') }}"
                            class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-600/10 transition font-semibold"
                            placeholder="Masukkan email aktif" required>
                        @error('buyer_email')
                            <p class="text-red-500 text-sm font-bold mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-black text-slate-700 mb-2 uppercase tracking-wide">
                            Nomor Telepon
                        </label>
                        <input type="text" name="buyer_phone" value="{{ old('buyer_phone') }}"
                            class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-600/10 transition font-semibold"
                            placeholder="Contoh: 081234567890" required>
                        @error('buyer_phone')
                            <p class="text-red-500 text-sm font-bold mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full py-4 bg-indigo-600 text-white rounded-2xl font-black text-lg shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition">
                        Konfirmasi Pemesanan
                    </button>
                </form>
            </div>

            {{-- SUMMARY EVENT --}}
            <div class="bg-white rounded-[2rem] border border-slate-100 shadow-xl p-8 h-fit">

                <h2 class="text-2xl font-black text-slate-900 mb-6">
                    Ringkasan Event
                </h2>

                <div class="space-y-5">
                    <div>
                        <p class="text-xs font-black uppercase text-slate-400 mb-2">
                            Nama Event
                        </p>
                        <h3 class="text-xl font-black text-slate-900">
                            {{ $event->title }}
                        </h3>
                    </div>

                    <div>
                        <p class="text-xs font-black uppercase text-slate-400 mb-2">
                            Lokasi
                        </p>
                        <p class="font-semibold text-slate-700">
                            {{ $event->location ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-black uppercase text-slate-400 mb-2">
                            Tanggal
                        </p>
                        <p class="font-semibold text-slate-700">
                            {{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d F Y, H:i') : '-' }}
                        </p>
                    </div>

                    <div class="border-t border-slate-100 pt-5">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-slate-500 font-bold">Harga Tiket</span>
                            <span class="font-black text-slate-900">
                                Rp {{ number_format($event->price, 0, ',', '.') }}
                            </span>
                        </div>

                        <div class="flex justify-between items-center mb-3">
                            <span class="text-slate-500 font-bold">Biaya Layanan</span>
                            <span class="font-black text-slate-900">
                                Rp 5.000
                            </span>
                        </div>

                        <div class="flex justify-between items-center border-t border-slate-100 pt-4">
                            <span class="text-lg font-black text-slate-900">Total</span>
                            <span class="text-2xl font-black text-indigo-600">
                                Rp {{ number_format($event->price + 5000, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>
@endsection