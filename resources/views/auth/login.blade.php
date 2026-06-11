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

<body class="bg-slate-100 min-h-screen flex items-center justify-center p-6">

    <div class="max-w-md w-full bg-white rounded-[2rem] p-8 shadow-2xl border border-slate-100">

        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-indigo-600 rounded-2xl flex items-center justify-center text-white font-black text-2xl mx-auto mb-4 shadow-lg shadow-indigo-200">
                AH
            </div>

            <h1 class="text-2xl font-black text-slate-900">
                Admin Login
            </h1>

            <p class="text-slate-500 font-medium mt-1">
                AmikomEventHub Dashboard
            </p>
        </div>

        @if(session('error'))
            <div class="bg-red-50 border border-red-200 text-red-600 p-4 rounded-2xl mb-6 font-bold text-sm text-center">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-600 p-4 rounded-2xl mb-6 font-bold text-sm text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-black text-slate-700 mb-2 uppercase tracking-wide">
                    Email
                </label>

                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-semibold"
                    placeholder="admin@amikom.ac.id" required autofocus>
            </div>

            <div>
                <label class="block text-sm font-black text-slate-700 mb-2 uppercase tracking-wide">
                    Password
                </label>

                <input type="password" name="password"
                    class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-semibold"
                    placeholder="Masukkan password" required>
            </div>

            <button type="submit"
                class="w-full py-4 bg-indigo-600 text-white rounded-2xl font-black text-lg shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition">
                Masuk Dashboard
            </button>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ route('home') }}" class="text-sm font-bold text-indigo-600 hover:text-indigo-800 transition">
                Kembali ke Website
            </a>
        </div>
    </div>

</body>
</html>