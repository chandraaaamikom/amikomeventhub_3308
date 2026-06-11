<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AmikomEventHub')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
        }
    </style>

    @yield('styles')
</head>

<body class="bg-slate-50 text-slate-900">

    {{-- NAVBAR --}}
    <header class="sticky top-0 z-50 px-4 py-4">
        <nav class="max-w-7xl mx-auto bg-white/95 backdrop-blur-xl rounded-2xl shadow-lg shadow-slate-200/70 border border-slate-100 px-5 md:px-8 py-4 flex items-center justify-between">

            {{-- LOGO --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="w-11 h-11 rounded-2xl bg-indigo-600 text-white flex items-center justify-center font-black text-xl shadow-lg shadow-indigo-200">
                    AH
                </div>

                <span class="text-xl md:text-2xl font-black text-slate-900">
                    AmikomEventHub
                </span>
            </a>

            {{-- CENTER MENU --}}
            <div class="hidden md:flex items-center gap-10 font-semibold text-slate-900">
                <a href="{{ route('home') }}#events" class="hover:text-indigo-600 transition">
                    Jelajahi
                </a>

                <a href="{{ route('katalog') }}" class="hover:text-indigo-600 transition">
                    Katalog
                </a>

                <a href="{{ route('bantuan') }}" class="hover:text-indigo-600 transition">
                    Bantuan
                </a>

                <a href="{{ route('kontak') }}" class="hover:text-indigo-600 transition">
                    Kontak
                </a>
            </div>

            {{-- RIGHT MENU --}}
            <div class="flex items-center gap-4">
                <a href="{{ route('profil') }}" class="hidden md:inline-block font-bold text-slate-900 hover:text-indigo-600 transition">
                    Profil
                </a>

                <a href="{{ route('admin.login') }}"
                    class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-black shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition">
                    Admin
                </a>
            </div>

        </nav>
    </header>

    {{-- CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-indigo-950 text-white mt-20">
        <div class="max-w-7xl mx-auto px-6 py-14 grid grid-cols-1 md:grid-cols-3 gap-10">

            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-white text-indigo-700 flex items-center justify-center font-black">
                        AH
                    </div>

                    <h2 class="text-2xl font-black">
                        AmikomEventHub
                    </h2>
                </div>

                <p class="text-indigo-200 leading-relaxed">
                    Platform reservasi tiket event online terbaik untuk mahasiswa dan penyelenggara profesional.
                </p>
            </div>

            <div>
                <h3 class="font-black mb-4">
                    Navigasi
                </h3>

                <ul class="space-y-3 text-indigo-200">
                    <li>
                        <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('katalog') }}" class="hover:text-white transition">Katalog Event</a>
                    </li>
                    <li>
                        <a href="{{ route('bantuan') }}" class="hover:text-white transition">Bantuan</a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="font-black mb-4">
                    Hubungi Kami
                </h3>

                <ul class="space-y-3 text-indigo-200">
                    <li>
                        <a href="{{ route('kontak') }}" class="hover:text-white transition">Halaman Kontak</a>
                    </li>
                    <li>support@amikomeventhub.com</li>
                    <li>+62 812 3456 7890</li>
                </ul>
            </div>

        </div>

        <div class="border-t border-indigo-800 py-5 text-center text-indigo-300 text-sm">
            © 2024 AmikomEventHub. Built with Laravel & Tailwind CSS.
        </div>
    </footer>

    @yield('scripts')
</body>
</html>