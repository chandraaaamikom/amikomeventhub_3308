<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - AmikomEventHub</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-slate-100">

    <div class="min-h-screen flex">

        {{-- LEFT SECTION --}}
        <div class="hidden lg:flex lg:w-1/2 bg-indigo-950 text-white relative overflow-hidden">

            <div class="absolute inset-0">
                <div class="absolute -top-24 -left-24 w-80 h-80 bg-indigo-600 rounded-full blur-3xl opacity-30"></div>
                <div class="absolute bottom-10 right-10 w-96 h-96 bg-purple-600 rounded-full blur-3xl opacity-20"></div>
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-950 via-indigo-900 to-slate-950"></div>
            </div>

            <div class="relative z-10 flex flex-col justify-between p-12 w-full">

                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-2xl bg-white text-indigo-700 flex items-center justify-center font-black text-xl shadow-lg">
                        AH
                    </div>
                    <div>
                        <h1 class="text-2xl font-black leading-none">AmikomEventHub</h1>
                        <p class="text-indigo-200 text-sm mt-1">Admin Management System</p>
                    </div>
                </div>

                <div>
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 border border-white/10 rounded-full text-indigo-100 text-sm font-bold mb-6">
                        Dashboard Penyelenggara
                    </div>

                    <h2 class="text-5xl font-black leading-tight mb-6">
                        Kelola Event <br>
                        Dengan Mudah.
                    </h2>

                    <p class="text-indigo-100 text-lg leading-relaxed max-w-xl">
                        Login sebagai admin untuk mengelola event, kategori, partner,
                        dan laporan transaksi pada platform AmikomEventHub.
                    </p>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <div class="bg-white/10 border border-white/10 rounded-3xl p-5">
                        <p class="text-3xl font-black">6+</p>
                        <p class="text-indigo-200 text-sm font-semibold mt-1">Event</p>
                    </div>

                    <div class="bg-white/10 border border-white/10 rounded-3xl p-5">
                        <p class="text-3xl font-black">3</p>
                        <p class="text-indigo-200 text-sm font-semibold mt-1">Kategori</p>
                    </div>

                    <div class="bg-white/10 border border-white/10 rounded-3xl p-5">
                        <p class="text-3xl font-black">24/7</p>
                        <p class="text-indigo-200 text-sm font-semibold mt-1">Akses</p>
                    </div>
                </div>

            </div>
        </div>

        {{-- RIGHT SECTION --}}
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6">

            <div class="w-full max-w-md">

                <div class="lg:hidden text-center mb-8">
                    <div class="w-16 h-16 rounded-2xl bg-indigo-600 text-white flex items-center justify-center font-black text-2xl mx-auto mb-4 shadow-lg">
                        AH
                    </div>
                    <h1 class="text-2xl font-black text-slate-900">AmikomEventHub</h1>
                    <p class="text-slate-500 font-medium">Admin Management System</p>
                </div>

                <div class="bg-white rounded-[2rem] shadow-xl border border-slate-200 p-8">

                    <div class="mb-8">
                        <div class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-50 text-indigo-700 rounded-full text-sm font-black mb-5">
                            Admin Login
                        </div>

                        <h2 class="text-3xl font-black text-slate-900">
                            Selamat Datang
                        </h2>

                        <p class="text-slate-500 mt-2">
                            Masuk untuk membuka dashboard admin.
                        </p>
                    </div>

                    @if(session('error'))
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-5 py-4 rounded-2xl font-bold text-sm">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-5 py-4 rounded-2xl font-bold text-sm">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-5">
                        @csrf

                        <div>
                            <label class="block text-sm font-black text-slate-700 mb-2 uppercase tracking-wide">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="admin@amikom.ac.id"
                                required
                                autofocus
                                class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl outline-none transition font-semibold text-slate-700 placeholder:text-slate-400 focus:bg-white focus:border-indigo-600 focus:ring-4 focus:ring-indigo-600/10"
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-black text-slate-700 mb-2 uppercase tracking-wide">
                                Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                placeholder="Masukkan password"
                                required
                                class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl outline-none transition font-semibold text-slate-700 placeholder:text-slate-400 focus:bg-white focus:border-indigo-600 focus:ring-4 focus:ring-indigo-600/10"
                            >
                        </div>

                        <button
                            type="submit"
                            class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-2xl font-black text-lg shadow-lg shadow-indigo-200 transition">
                            Masuk Dashboard
                        </button>
                    </form>

                    <div class="mt-6 text-center">
                        <a href="{{ route('home') }}"
                           class="inline-flex items-center justify-center text-sm font-black text-indigo-600 hover:text-indigo-800 transition">
                            Kembali ke Website
                        </a>
                    </div>

                </div>

                <p class="text-center text-slate-400 text-sm font-semibold mt-6">
                    © 2026 AmikomEventHub. Built with Laravel & Tailwind CSS.
                </p>

            </div>

        </div>

    </div>

</body>
</html>