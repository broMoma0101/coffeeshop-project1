<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu | CoffeeBreak</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#211711] text-white font-sans antialiased">

    <!-- Navbar -->
    <nav
        class="sticky top-0 z-50 bg-[#6E3511]/95 backdrop-blur-sm flex justify-between items-center px-8 md:px-20 py-5 border-b border-white/10 shadow-sm">
        <a href="{{ route('home') }}" class="text-2xl font-bold tracking-wide">Coffee<span
                class="text-[#F4AE52]">Break</span></a>

        <div class="hidden md:flex items-center gap-8 font-medium">
            <a href="{{ route('home') }}" class="transition-colors duration-300 hover:text-[#F4AE52]">Home</a>
            <a href="{{ route('menu.index') }}" class="transition-colors duration-300 text-[#F4AE52] font-bold">Menu</a>
            <a href="{{ route('home') }}#news" class="transition-colors duration-300 hover:text-[#F4AE52]">Proses</a>
            <a href="{{ route('pesanan.index') }}" class="transition-colors duration-300 hover:text-[#F4AE52]">Data
                Pesanan</a>
            <a href="{{ route('pesanan.cek') }}" class="transition-colors duration-300 hover:text-[#F4AE52]">Cek
                Tagihan</a>
        </div>

        <div class="flex items-center gap-4">
            <div class="text-right hidden md:block">
                <p class="text-sm font-bold text-[#F4AE52]">{{ Auth::user()->name }}</p>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="bg-red-900/50 hover:bg-red-700 text-white px-5 py-2 rounded-full font-semibold text-sm transition-all shadow-md">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <!-- Header Menu -->
    <section class="text-center py-16 px-6 relative overflow-hidden">
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-[#CC6F00] rounded-full blur-[100px] opacity-20">
        </div>
        <h1 class="text-4xl md:text-5xl font-bold mb-4 relative z-10">Jelajahi <span class="text-[#F4AE52]">Rasa
                Kami</span></h1>
        <p class="text-orange-200 text-lg max-w-2xl mx-auto relative z-10">Dari yang klasik hingga kreasi manual brew,
            temukan racikan kopi favorit yang paling pas untuk hari Anda.</p>
    </section>

    <!-- Grid Menu -->
    <section class="px-8 md:px-20 pb-16">
        <div class="mx-auto max-w-7xl grid gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

            @foreach ($menus as $menu)
                <article
                    class="group overflow-hidden rounded-2xl bg-[#2A1A0E] border border-white/5 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-[#CC6F00]/20 flex flex-col">
                    <!-- Gambar -->
                    <div class="overflow-hidden h-56 bg-[#3D2616]">
                        <img src="{{ asset($menu->gambar) }}" alt="{{ $menu->nama }}"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>

                    <!-- Info -->
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold mb-2 text-white">{{ $menu->nama }}</h3>
                        <p class="text-white/60 text-sm mb-6 leading-relaxed flex-grow">{{ $menu->deskripsi }}</p>

                        <div class="mt-auto flex items-center justify-between border-t border-white/10 pt-4">
                            <span class="font-bold text-[#F4AE52] text-lg">Rp
                                {{ number_format($menu->harga, 0, ',', '.') }}</span>
                            <!-- Tombol ini sekarang mengarah ke form di bawah halaman ini -->
                            <a href="#contact"
                                class="rounded-full bg-[#CC6F00] px-4 py-2 text-xs font-semibold text-white transition hover:bg-[#b05f00]">
                                Pesan
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach

        </div>
    </section>

    <!-- Form Pemesanan -->
    <section id="contact" class="bg-[#1C120E] py-24 px-8 md:px-20 border-t border-white/5">
        <div class="mx-auto grid max-w-7xl items-center gap-14 md:grid-cols-2">
            <div>
                <p class="text-sm tracking-[0.3em] text-[#F4AE52] font-semibold mb-3">
                    PEMESANAN
                </p>
                <h2 class="mb-6 text-4xl font-bold md:text-5xl">
                    Pesan <span class="text-[#CC6F00]">Sekarang</span>
                </h2>
                <p class="text-orange-200 text-lg leading-relaxed max-w-md">
                    Pilih menu kopi favorit Anda, tentukan jumlahnya, dan kirim pesanan melalui formulir berikut.
                </p>
            </div>

            <div>
                <!-- TAG PEMBUKA FORM YANG HILANG DIKEMBALIKAN -->
                <form action="{{ route('pesanan.store') }}" method="POST" class="rounded-3xl bg-[#2A1A0E] p-8 md:p-12 shadow-2xl border border-white/5">
                    @csrf

                    @if (session('success'))
                        <div class="mb-6 rounded-xl bg-green-700 p-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-6 rounded-xl bg-red-700 p-4">
                            <p class="font-bold mb-2">Pesanan belum berhasil dikirim:</p>
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="grid gap-6 mb-6">
                        <!-- INPUT NAMA YANG HILANG DIKEMBALIKAN -->
                        <div>
                            <label for="nama" class="block mb-2 font-medium">Nama Lengkap</label>
                            <input id="nama" type="text" name="nama" value="{{ old('nama') }}" class="w-full rounded-xl border border-white/10 bg-[#3D2616] px-5 py-3 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-[#F4AE52]" placeholder="Masukkan nama Anda" required>
                        </div>

                        <!-- INPUT NOMOR HP YANG HILANG DIKEMBALIKAN -->
                        <div>
                            <label for="nomor_hp" class="block mb-2 font-medium">Nomor HP / WhatsApp</label>
                            <input id="nomor_hp" type="tel" name="nomor_hp" value="{{ old('nomor_hp') }}" class="w-full rounded-xl border border-white/10 bg-[#3D2616] px-5 py-3 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-[#F4AE52]" placeholder="Masukkan nomor HP" required>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="block mb-3 font-medium text-white/80">Pilih Pesanan Anda</label>

                        <!-- Kontainer Grid Horizontal -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 max-h-[350px] overflow-y-auto pr-2 pb-2 custom-scrollbar">
                            @foreach ($menus as $menu)
                                <div class="flex flex-col justify-between bg-[#3D2616]/60 p-4 rounded-2xl border border-white/10 hover:border-[#F4AE52]/50 transition-all duration-300">
                                    
                                    <div class="mb-4">
                                        <p class="font-bold text-white text-base leading-tight">{{ $menu->nama }}</p>
                                        <p class="text-sm font-semibold text-[#F4AE52] mt-1">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                                    </div>

                                    <div class="flex items-center justify-between bg-[#2A1A0E] rounded-full p-1 border border-white/5">
                                        <button type="button" class="btn-minus w-8 h-8 rounded-full bg-transparent text-white/70 flex items-center justify-center hover:bg-[#CC6F00] hover:text-white transition" data-id="{{ $menu->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M20 12H4" />
                                            </svg>
                                        </button>

                                        <span class="w-8 text-center font-bold text-white text-sm" id="display-qty-{{ $menu->id }}">0</span>

                                        <button type="button" class="btn-plus w-8 h-8 rounded-full bg-transparent text-white/70 flex items-center justify-center hover:bg-[#CC6F00] hover:text-white transition" data-id="{{ $menu->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" />
                                            </svg>
                                        </button>

                                        <input type="checkbox" name="menu_ids[]" value="{{ $menu->id }}" id="check-{{ $menu->id }}" class="hidden menu-check" data-harga="{{ $menu->harga }}">
                                        <input type="hidden" name="jumlah[{{ $menu->id }}]" id="input-qty-{{ $menu->id }}" value="0">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-2 pt-4 border-t border-white/10 flex justify-between items-center gap-3">
                        <span class="text-white/70 font-medium">Total Estimasi:</span>
                        <span id="total-harga-tampil" class="text-2xl md:text-3xl font-bold text-[#F4AE52]">Rp 0</span>
                    </div>

                    <p class="text-xs text-white/50 mt-1">Total ini merupakan estimasi harga berdasarkan menu dan jumlah yang dipilih.</p>

                    <button type="submit" class="mt-5 pt-4 w-full rounded-full bg-[#CC6F00] px-8 py-3 font-semibold text-white transition hover:bg-[#b05f00] hover:scale-[1.01] shadow-lg">
                        Kirim Pesanan
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="border-t py-8 px-6 border-white/10 bg-[#1C120E]">
        <div class="mx-auto max-w-7xl flex items-center justify-between">
            <p class="font-semibold text-white text-xl">Coffee<span class="text-[#F4AE52]">Break</span></p>
            <p class="text-sm text-white/50">&copy; {{ date('Y') }} Coffee Break. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <script>
        const btnMinus = document.querySelectorAll('.btn-minus');
        const btnPlus = document.querySelectorAll('.btn-plus');
        const totalTampil = document.getElementById('total-harga-tampil');

        function hitungTotal() {
            let total = 0;
            document.querySelectorAll('.menu-check').forEach(check => {
                if (check.checked) {
                    const qty = parseInt(document.getElementById('input-qty-' + check.value).value);
                    total += parseInt(check.dataset.harga) * qty;
                }
            });
            totalTampil.innerText = 'Rp ' + total.toLocaleString('id-ID');
        }

        btnPlus.forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const displayQty = document.getElementById('display-qty-' + id);
                const inputQty = document.getElementById('input-qty-' + id);
                const checkbox = document.getElementById('check-' + id);

                let currentQty = parseInt(inputQty.value);
                currentQty++;

                displayQty.innerText = currentQty;
                inputQty.value = currentQty;
                checkbox.checked = true;

                hitungTotal();
            });
        });

        btnMinus.forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const displayQty = document.getElementById('display-qty-' + id);
                const inputQty = document.getElementById('input-qty-' + id);
                const checkbox = document.getElementById('check-' + id);

                let currentQty = parseInt(inputQty.value);

                if (currentQty > 0) {
                    currentQty--;
                    displayQty.innerText = currentQty;
                    inputQty.value = currentQty;

                    if (currentQty === 0) {
                        checkbox.checked = false;
                    }

                    hitungTotal();
                }
            });
        });
    </script>
</body>

</html>
