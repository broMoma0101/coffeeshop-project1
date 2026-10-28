<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | CoffeeBreak</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#211711] text-white font-sans antialiased min-h-screen flex items-center justify-center p-6">

    <div class="max-w-md w-full bg-[#2A1A0E] rounded-3xl p-10 shadow-2xl border border-white/10 relative overflow-hidden">
        <div class="absolute -top-10 -right-10 w-40 h-40 bg-[#CC6F00] rounded-full blur-3xl opacity-20"></div>

        <div class="text-center mb-8 relative z-10">
            <h1 class="text-3xl font-bold mb-2">Admin <span class="text-[#F4AE52]">Login</span></h1>
            <p class="text-orange-200 text-sm">Masuk untuk mengelola data pesanan CoffeeBreak.</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 rounded-xl bg-red-700/80 p-4 text-white text-sm text-center border border-red-500">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST" class="relative z-10">
            @csrf
            
            <div class="mb-5">
                <label class="block text-white/70 text-sm font-medium mb-2">Email Admin</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full rounded-xl border border-white/10 bg-[#3D2616] px-5 py-3 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-[#F4AE52]" placeholder="xxxxxx@gmail.com" required>
            </div>

            <div class="mb-8">
                <label class="block text-white/70 text-sm font-medium mb-2">Password</label>
                <input type="password" name="password" class="w-full rounded-xl border border-white/10 bg-[#3D2616] px-5 py-3 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-[#F4AE52]" placeholder="••••••••" required>
            </div>

            <button type="submit" class="w-full rounded-xl bg-[#CC6F00] px-8 py-3 font-semibold text-white transition hover:bg-[#b05f00] hover:scale-105 shadow-lg">
                Masuk ke Dashboard
            </button>

            <a href="{{ route('home') }}" class="block text-center mt-6 text-sm text-white/50 hover:text-[#F4AE52] transition">
                &larr; Kembali ke Beranda
            </a>
        </form>
    </div>

</body>
</html>