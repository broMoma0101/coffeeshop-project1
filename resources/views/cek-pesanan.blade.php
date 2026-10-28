<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Tagihan | CoffeeBreak</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#211711] text-white font-sans antialiased min-h-screen flex items-center justify-center p-6">

    <div class="max-w-md w-full bg-[#2A1A0E] rounded-3xl p-8 shadow-2xl border border-white/10 relative overflow-hidden">
        <h1 class="text-3xl font-bold mb-2 text-center">Cek <span class="text-[#CC6F00]">Tagihan</span></h1>
        <p class="text-orange-200 text-center mb-8 text-sm">Masukkan nomor HP yang Anda gunakan saat memesan.</p>

        @if (session('error'))
            <div class="mb-6 rounded-xl bg-red-700 p-4 text-white text-sm text-center">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('pesanan.proses_cek') }}" method="POST">
            @csrf
            <div class="mb-6">
                <input type="tel" name="nomor_hp" class="w-full rounded-full border border-white/10 bg-transparent px-6 py-3 text-white placeholder-white/50" placeholder="Masukkan Nomor HP" required>
            </div>
            <button type="submit" class="w-full rounded-full bg-[#CC6F00] px-8 py-3 font-semibold text-white transition hover:bg-[#b05f00] hover:scale-105 shadow-lg">
                Cari Pesanan Saya
            </button>
            <a href="{{ route('home') }}" class="block text-center mt-4 text-[#F4AE52] hover:text-white transition">Kembali ke Beranda</a>
        </form>
    </div>

</body>
</html>