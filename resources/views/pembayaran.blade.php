<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tagihan Pembayaran | CoffeeBreak</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#211711] text-white font-sans antialiased min-h-screen flex items-center justify-center p-6">

    <div class="max-w-xl w-full bg-[#2A1A0E] rounded-3xl p-8 md:p-12 shadow-2xl border border-white/10 relative overflow-hidden">
        <!-- Dekorasi Blur -->
        <div class="absolute -top-10 -right-10 w-40 h-40 bg-[#CC6F00] rounded-full blur-3xl opacity-20"></div>

        <div class="text-center mb-8 relative z-10">
            <h1 class="text-3xl font-bold mb-2">Tagihan <span class="text-[#F4AE52]">Pesanan</span></h1>
            <p class="text-orange-200">Halo, <span class="font-bold text-white">{{ $pesanan->nama }}</span>! Berikut rincian pesanan Anda.</p>
        </div>

        <!-- Box Detail Pesanan -->
        <div class="bg-[#3D2616] rounded-2xl p-6 mb-8 border border-white/5 relative z-10">
            <div class="flex justify-between items-center mb-6 border-b border-white/10 pb-4">
                <h2 class="text-sm tracking-widest text-[#F4AE52] font-semibold uppercase">Detail Informasi</h2>
                @if($pesanan->status == 'Sudah Bayar')
                    <span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">LUNAS</span>
                @else
                    <span class="bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">BELUM BAYAR</span>
                @endif
            </div>
            
            <div class="space-y-4 text-orange-100">
                <div class="flex justify-between items-center">
                    <span class="text-white/60">ID Pesanan:</span>
                    <span class="font-mono font-bold text-white">#CB-{{ str_pad($pesanan->id, 4, '0', STR_PAD_LEFT) }}</span>
                </div>
                
                <div class="flex justify-between items-center">
                    <span class="text-white/60">Nama Pelanggan:</span>
                    <span class="font-bold text-white">{{ $pesanan->nama }}</span>
                </div>

                <div class="flex justify-between items-center">
                    <span class="text-white/60">No. WhatsApp:</span>
                    <span class="text-white">{{ $pesanan->nomor_hp }}</span>
                </div>

                <!-- Bagian Jenis Minuman -->
                <div class="pt-4 border-t border-white/10">
                    <span class="text-white/60 block mb-3 text-sm">Jenis Minuman yang Dipesan:</span>
                    <div class="bg-[#2A1A0E] p-4 rounded-xl border border-white/5">
                        <p class="font-semibold text-lg text-white leading-relaxed">{{ $pesanan->pesanan }}</p>
                    </div>
                </div>
                
                <!-- Total Tagihan -->
                <div class="flex justify-between items-center pt-4 border-t border-white/10 mt-4">
                    <span class="text-white/60">Total Tagihan:</span>
                    @if($pesanan->total_harga)
                        <span class="font-bold text-3xl text-[#F4AE52]">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</span>
                    @else
                        <span class="text-sm italic text-orange-300 text-right">Sedang dihitung<br>oleh Admin...</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Tampilkan Instruksi Bayar JIKA Belum Lunas -->
        @if($pesanan->status == 'Belum Bayar')
        <div class="text-center relative z-10 bg-black/20 rounded-2xl p-6 mb-8 border border-white/5">
            <h2 class="text-sm tracking-widest text-[#F4AE52] font-semibold mb-4 uppercase">Metode Pembayaran</h2>
            
            <div class="bg-white text-black rounded-xl p-4 inline-block mb-4 shadow-lg">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Pembayaran+Kopi+ID+{{ $pesanan->id }}" alt="QRIS Dummy" class="mx-auto w-32 h-32">
                <p class="text-xs font-bold mt-2">Scan QRIS</p>
            </div>

            <div class="space-y-2 text-sm text-orange-200">
                <p>BCA: <span class="font-bold text-white tracking-widest">1234 5678 90</span> a.n CoffeeBreak</p>
                <p>Mandiri: <span class="font-bold text-white tracking-widest">0987 6543 21</span> a.n CoffeeBreak</p>
            </div>
        </div>
        @else
        <!-- Tampilkan Pesan Sukses JIKA Sudah Lunas -->
        <div class="text-center mb-8 relative z-10">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-green-500/20 text-green-500 mb-4 border border-green-500/30">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
            </div>
            <p class="text-green-400 font-medium text-lg">Pembayaran telah dikonfirmasi.<br>Terima kasih atas pesanan Anda!</p>
        </div>
        @endif

        <div class="relative z-10">
            <a href="{{ route('home') }}" class="block text-center w-full rounded-full bg-[#CC6F00] px-8 py-3 font-semibold text-white transition hover:bg-[#b05f00] hover:scale-105 shadow-lg">
                Kembali ke Beranda
            </a>
        </div>
    </div>

</body>
</html>