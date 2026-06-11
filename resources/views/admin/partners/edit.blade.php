@extends('layouts.admin')

@section('title', 'Edit Partner - AmikomEventHub')
@section('page-title', 'Edit Partner')

@section('content')
    <div class="max-w-3xl">

        <div class="mb-8">
            <h1 class="text-4xl font-black text-slate-900">
                Edit Partner
            </h1>
            <p class="text-slate-500 font-medium mt-2">
                Perbarui data partner.
            </p>
        </div>

        <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm p-8">
            <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-black text-slate-700 mb-2 uppercase tracking-wide">
                        Nama Partner
                    </label>
                    <input type="text" name="name" value="{{ old('name', $partner->name) }}"
                        class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-600/10 transition font-semibold"
                        required>

                    @error('name')
                        <p class="text-red-500 text-sm font-bold mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-black text-slate-700 mb-2 uppercase tracking-wide">
                        URL Logo
                    </label>
                    <input type="text" name="logo_url" value="{{ old('logo_url', $partner->logo_url) }}"
                        class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-600/10 transition font-semibold"
                        required>

                    @error('logo_url')
                        <p class="text-red-500 text-sm font-bold mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4">
                    <p class="text-sm font-black text-slate-500 uppercase mb-3">Preview Logo</p>
                    <div class="w-28 h-28 bg-slate-50 border border-slate-100 rounded-2xl flex items-center justify-center overflow-hidden">
                        <img src="{{ $partner->logo_url }}" alt="{{ $partner->name }}"
                            class="w-full h-full object-contain p-3">
                    </div>
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit"
                        class="px-7 py-4 bg-indigo-600 text-white rounded-2xl font-black hover:bg-indigo-700 transition">
                        Update Partner
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