<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - AmikomEventHub')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-100 text-slate-900">

    <div class="min-h-screen flex">

        {{-- SIDEBAR --}}
        <aside class="w-72 bg-indigo-950 text-white fixed inset-y-0 left-0 z-40 hidden lg:flex flex-col">

            {{-- LOGO --}}
            <div class="p-8">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-white text-indigo-700 rounded-2xl flex items-center justify-center font-black text-xl shadow-lg">
                        AH
                    </div>

                    <div>
                        <h1 class="text-2xl font-black leading-none">
                            AmikomEventHub
                        </h1>
                    </div>
                </a>
            </div>

            {{-- MENU --}}
            <nav class="flex-1 px-6 py-4 space-y-3">

                <p class="text-xs font-black uppercase tracking-widest text-indigo-300 mb-5">
                    Main Menu
                </p>

                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-4 px-5 py-4 rounded-2xl font-bold transition
                    {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-700 text-white' : 'text-indigo-100 hover:bg-white/10 hover:text-white' }}">
                    <span class="text-indigo-300">
                        ⊞
                    </span>
                    Dashboard
                </a>

                <a href="{{ route('admin.events.index') }}"
                    class="flex items-center gap-4 px-5 py-4 rounded-2xl font-bold transition
                    {{ request()->routeIs('admin.events.*') ? 'bg-indigo-700 text-white' : 'text-indigo-100 hover:bg-white/10 hover:text-white' }}">
                    <span class="text-indigo-300">
                        ◴
                    </span>
                    Kelola Event
                </a>

                <a href="{{ route('admin.categories.index') }}"
                    class="flex items-center gap-4 px-5 py-4 rounded-2xl font-bold transition
                    {{ request()->routeIs('admin.categories.*') ? 'bg-indigo-700 text-white' : 'text-indigo-100 hover:bg-white/10 hover:text-white' }}">
                    <span class="text-indigo-300">
                        ☰
                    </span>
                    Kelola Kategori
                </a>

                <a href="{{ route('admin.partners.index') }}"
                    class="flex items-center gap-4 px-5 py-4 rounded-2xl font-bold transition
                    {{ request()->routeIs('admin.partners.*') ? 'bg-indigo-700 text-white' : 'text-indigo-100 hover:bg-white/10 hover:text-white' }}">
                    <span class="text-indigo-300">
                        ⌘
                    </span>
                    Kelola Partner
                </a>

                <a href="{{ route('admin.transactions.index') }}"
                    class="flex items-center gap-4 px-5 py-4 rounded-2xl font-bold transition
                    {{ request()->routeIs('admin.transactions.*') ? 'bg-indigo-700 text-white' : 'text-indigo-100 hover:bg-white/10 hover:text-white' }}">
                    <span class="text-indigo-300">
                        ▥
                    </span>
                    Laporan Transaksi
                </a>

            </nav>

            {{-- BOTTOM MENU --}}
            <div class="p-6 border-t border-indigo-800 space-y-2">

                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf

                    <button type="submit"
                        class="w-full flex items-center gap-4 px-5 py-4 rounded-2xl font-bold text-indigo-200 hover:bg-white/10 hover:text-white transition text-left">
                        <span>↪</span>
                        Keluar
                    </button>
                </form>

                <a href="{{ route('home') }}"
                    class="flex items-center gap-4 px-5 py-4 rounded-2xl font-bold text-indigo-200 hover:bg-white/10 hover:text-white transition">
                    <span>⌂</span>
                    Keluar ke Website
                </a>

            </div>

        </aside>

        {{-- MAIN CONTENT --}}
        <main class="flex-1 lg:ml-72 min-h-screen">

            {{-- CONTENT --}}
            <div class="p-8 lg:p-12">

                {{-- TOP AREA --}}
                <div class="flex items-start justify-between mb-12">
                    <div>
                        <h1 class="text-4xl font-black text-slate-900">
                            @yield('page-title', 'Dashboard')
                        </h1>

                        <p class="text-slate-500 font-medium mt-2">
                            Selamat datang kembali, Admin!
                        </p>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="text-right hidden sm:block">
                            <p class="font-black text-slate-900">
                                {{ Auth::user()->name ?? 'Admin' }}
                            </p>

                            <p class="text-sm text-slate-400 font-medium">
                                Penyelenggara Utama
                            </p>
                        </div>

                        <div class="w-12 h-12 bg-indigo-600 text-white rounded-2xl flex items-center justify-center font-black text-lg shadow-lg shadow-indigo-200">
                            AS
                        </div>
                    </div>
                </div>

                @yield('content')

            </div>

        </main>

    </div>

</body>
</html>