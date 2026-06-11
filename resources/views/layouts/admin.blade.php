<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - AmikomEventHub')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>

<body class="bg-slate-100 text-slate-900">

    <div class="min-h-screen flex">

    <!-- ===== SIDEBAR ===== -->
    <aside class="w-64 bg-indigo-900 text-indigo-100 flex flex-col p-6 space-y-8 sticky top-0 h-screen">
        <div class="flex items-center gap-3">
            <div
                class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-indigo-900 font-bold text-xl">
                AH
            </div>

            <nav class="flex-1 p-5 space-y-2">

                <p class="px-4 mb-4 text-xs uppercase tracking-widest font-black text-indigo-400">
                    Main Menu
                </p>

                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-2xl text-indigo-100 hover:text-white hover:bg-white/10 transition font-semibold">
                    Dashboard
                </a>

            <a href="{{ route('admin.events.index') }}"
                class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.events.*') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }} rounded-xl font-bold transition">
                <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
                Kelola Event
            </a>

            <a href="{{ route('admin.categories.index') }}"
                class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.categories.*') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }} rounded-xl font-bold transition">
                <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
                Kelola Kategori
            </a>

            <a href="{{ route('admin.partners.index') }}"
                class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.partners.*') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }} rounded-xl font-bold transition">
                <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-4a4 4 0 100-8 4 4 0 000 8z">
                    </path>
                </svg>
                Kelola Partner
            </a>

                <a href="{{ route('admin.transactions.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-2xl text-indigo-100 hover:text-white hover:bg-white/10 transition font-semibold">
                    Laporan Transaksi
                </a>

            </nav>

            <div class="p-5 border-t border-indigo-800 space-y-2">

                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf

                    <button type="submit"
                        class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl text-indigo-300 hover:text-white hover:bg-white/10 transition font-semibold text-left">
                        Keluar
                    </button>
                </form>

                <a href="{{ route('home') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-2xl text-indigo-300 hover:text-white hover:bg-white/10 transition font-semibold">
                    Keluar ke Website
                </a>

            </div>

        </aside>

        {{-- MAIN CONTENT --}}
        <main class="flex-1 lg:ml-72">

            {{-- TOP BAR --}}
            <header class="bg-white border-b border-slate-200 sticky top-0 z-30">
                <div class="px-6 lg:px-10 py-5 flex items-center justify-between">

                    <div>
                        <h2 class="text-xl font-black text-slate-900">
                            @yield('page-title', 'Admin Dashboard')
                        </h2>
                        <p class="text-sm text-slate-500 font-medium">
                            Kelola data AmikomEventHub dengan mudah.
                        </p>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="hidden sm:block text-right">
                            <p class="font-black text-slate-900">
                                {{ Auth::user()->name ?? 'Admin Amikom' }}
                            </p>
                            <p class="text-xs text-slate-500 font-bold uppercase">
                                Admin
                            </p>
                        </div>

                        <div class="w-11 h-11 rounded-2xl bg-indigo-600 text-white flex items-center justify-center font-black shadow-lg shadow-indigo-200">
                            AH
                        </div>
                    </div>

                </div>
            </header>

            <section class="p-6 lg:p-10">
                @yield('content')
            </section>

        </main>

    </div>

</body>
</html>