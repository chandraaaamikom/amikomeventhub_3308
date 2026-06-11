@extends('layouts.admin')

@section('title', 'Edit Partner')

@section('content')
    <div class="min-h-screen bg-slate-100 px-6 py-12">
        <div class="max-w-3xl mx-auto bg-white rounded-3xl shadow-xl p-8">

            <h1 class="text-3xl font-black mb-8">
                Edit Partner
            </h1>

            <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="space-y-6">

                    <div>
                        <label class="font-bold block mb-2">
                            Nama Partner
                        </label>

                        <input type="text" name="name" value="{{ $partner->name }}"
                            class="w-full border border-slate-200 p-4 rounded-2xl">
                    </div>

                    <div>
                        <label class="font-bold block mb-2">
                            URL Logo
                        </label>

                        <input type="text" name="logo_url" value="{{ $partner->logo_url }}"
                            class="w-full border border-slate-200 p-4 rounded-2xl">
                    </div>

                    <button class="px-6 py-4 bg-indigo-600 text-white rounded-2xl font-bold">
                        Update
                    </button>

                </div>

            </form>

        </div>
    </div>
@endsection