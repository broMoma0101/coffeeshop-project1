<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoffeeBreak | Kedai Kopi</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body class="bg-[#6E3511] text-white font-sans antialiased">

    <!-- Navbar -->
    <nav
        class="sticky top-0 z-50 bg-[#6E3511]/95 backdrop-blur-sm
         flex justify-between items-center px-8 md:px-20 py-5 
         border-b border-white/10 shadow-sm">
        <a href="#home" class="text-2xl font-bold tracking-wide"
        >Coffee<span class="text-[#F4AE52]">Break</span></a>

        <div class="hidden md:flex items-center gap-8 font-medium">
            <a href="#home" class="transition-colors duration-300 
            hover:text-[#F4AE52]">Home</a>
            <!-- Perubahan tautan Menu di sini -->
            <a href="{{ route('menu.index') }}" class="transition-colors 
            duration-300 hover:text-[#F4AE52]">Menu</a>
            <a href="#news" class="transition-colors duration-300 
            hover:text-[#F4AE52]">Proses</a>
            <a href="{{ route('pesanan.index') }}" class="transition-colors duration-300 
            hover:text-[#F4AE52]">
                Data Pesanan
            </a>
            <a href="{{ route('pesanan.cek') }}" class="transition-colors
             duration-300 hover:text-[#F4AE52]">Cek
                Tagihan</a>
        </div>

        <div class="flex items-center gap-4">
            <div class="text-right hidden md:block">
                <p class="text-sm font-bold text-[#F4AE52]">{{ Auth::user()->name }}</p>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="bg-red-900/50 hover:bg-red-700 text-white px-5 py-2 rounded-full 
                    font-semibold text-sm transition-all duration-300 border border-red-500/30
                    shadow-md">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home"
        class="flex min-h-[85vh] items-center justify-between
        px-8 md:px-20 py-16 flex-col lg:flex-row gap-12">

        <div class="max-w-2xl">
            <p class="mb-3 text-sm md:text-base uppercase font-bold
                tracking-[0.2em] text-[#F4AE52]">
                Selamat Datang di Kedai Kopi Kami
            </p>

            <h1 class="text-5xl md:text-7xl font-extrabold leading-tight">
                Nikmati Setiap
                <span class="text-[#F4AE52]">Tetes</span>
            </h1>

            <p class="mt-6 max-w-lg text-lg leading-relaxed text-orange-200">
                Nikmati kopi dari seruputan pertama hingga terakhir.
                Dibuat dengan biji kopi terbaik dan diracik oleh
                 barista profesional.
            </p>

            <div class="mt-10 flex flex-wrap gap-5 items-center">
                <a href="{{ route('menu.index') }}"
                    class="rounded-full bg-[#CC6F00] px-8 py-3
                    font-semibold shadow-lg transition hover:bg-[#b05f00]">
                    Lihat Menu
                </a>

                <a href="#jelajah"
                    class="rounded-full border-2 border-[#F2F7A0]
                    px-8 py-3 font-semibold text-[#F2F7A0]
                    transition hover:bg-[#F2F7A0] hover:text-[#6E3511]">
                    Cerita Kami
                </a>
            </div>
        </div>

        <div class="max-w-md lg:max-w-lg w-full relative">
            <div class="absolute inset-0 bg-[#CC6F00] rounded-3xl
                blur-2xl opacity-30 translate-y-4">
            </div>

            <img src="{{ asset('assets/mocha.jpg') }}" alt=
            "Secangkir Kopi Hangat"
                class="relative w-full h-[500px] rounded-3xl
                object-cover shadow-2xl border-4 border-white/10">
        </div>
    </section>

    <!-- Menu Pilihan -->
    <section id="menu" class="bg-[#2A1A0E] px-8 md:px-20 py-24 
    text-white">

        <div class="mx-auto max-w-7xl">
            <div class="mb-16 text-center">
                <p class="text-sm tracking-[0.3em] text-[#F4AE52]
                    font-semibold mb-3">
                    OUR FAVORITE
                </p>

                <h2 class="text-4xl md:text-5xl font-bold">
                    Menu <span class="text-[#CC6F00]">Rekomendasi</span>
                </h2>
            </div>

            <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3">

                <!-- Americano -->
                <article
                    class="group overflow-hidden rounded-2xl
                    bg-[#3D2616] transition hover:-translate-y-2
                    hover:shadow-2xl flex flex-col">

                    <div class="overflow-hidden h-64">
                        <img src="{{ asset('assets/americano.jpg') }}" alt="Americano"
                            class="h-full w-full object-cover
                            transition-transform duration-500
                            group-hover:scale-110">
                    </div>

                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-2xl font-bold mb-3">Americano</h3>

                        <p class="text-orange-200 text-sm mb-8">
                            Perpaduan espresso dan air dengan cita rasa kopi murni.
                        </p>

                        <div class="mt-auto flex items-center justify-between">
                            <span class="font-bold text-[#F4AE52] text-xl">
                                Rp 30.000
                            </span>

                            <a href="{{ route('menu.index') }}"
                                class="rounded-full bg-[#CC6F00] px-5 py-2 text-sm font-semibold text-white transition hover:bg-[#b05f00]">Pesan</a>
                        </div>
                    </div>
                </article>

                <!-- Cappuccino -->
                <article
                    class="group overflow-hidden rounded-2xl
                    bg-[#3D2616] transition hover:-translate-y-2
                    hover:shadow-2xl flex flex-col">

                    <div class="overflow-hidden h-64">
                        <img src="{{ asset('assets/capucino.jpg') }}" alt="Cappuccino"
                            class="h-full w-full object-cover
                            transition-transform duration-500
                            group-hover:scale-110">
                    </div>

                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-2xl font-bold mb-3">Cappuccino</h3>

                        <p class="text-orange-200 text-sm mb-8">
                            Perpaduan espresso, susu hangat, dan busa susu lembut.
                        </p>

                        <div class="mt-auto flex items-center justify-between">
                            <span class="font-bold text-[#F4AE52] text-xl">
                                Rp 28.000
                            </span>

                            <a href="{{ route('menu.index') }}"
                                class="rounded-full bg-[#CC6F00] px-5 py-2 text-sm font-semibold text-white transition hover:bg-[#b05f00]">Pesan</a>
                        </div>
                    </div>
                </article>

                <!-- Latte -->
                <article
                    class="group overflow-hidden rounded-2xl
                    bg-[#3D2616] transition hover:-translate-y-2
                    hover:shadow-2xl flex flex-col">

                    <div class="overflow-hidden h-64">
                        <img src="{{ asset('assets/latte.jpg') }}" alt="Latte"
                            class="h-full w-full object-cover
                            transition-transform duration-500
                            group-hover:scale-110">
                    </div>

                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-2xl font-bold mb-3">Latte</h3>

                        <p class="text-orange-200 text-sm mb-8">
                            Paduan espresso dan susu lembut untuk menemani waktu santai.
                        </p>

                        <div class="mt-auto flex items-center justify-between">
                            <span class="font-bold text-[#F4AE52] text-xl">
                                Rp 20.000
                            </span>

                            <a href="{{ route('menu.index') }}"
                                class="rounded-full bg-[#CC6F00] px-5 py-2 text-sm font-semibold text-white transition hover:bg-[#b05f00]">Pesan</a>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </section>

    <!-- Tentang Kami -->
    <section id="jelajah" class="px-8 md:px-20 py-24 bg-[#6E3511]">

        <div class="mx-auto grid max-w-7xl items-center
            gap-14 md:grid-cols-2">

            <div>
                <img src="{{ asset('assets/pexels-ahmetyuksek-29799615.jpg') }}" alt="Biji Kopi Pilihan"
                    class="w-full h-[500px] rounded-3xl
                    object-cover shadow-2xl">
            </div>

            <div>
                <p class="text-sm tracking-[0.3em] text-[#F4AE52]
                    font-semibold mb-3">
                    TENTANG KAMI
                </p>

                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    Dibuat Dengan
                    <span class="text-[#CC6F00]">Hati</span>
                </h2>

                <p class="leading-relaxed text-orange-200 mb-8 text-lg">
                    Setiap cangkir yang kami sajikan berawal dari kecintaan
                    kami pada kopi Nusantara. Biji kopi dipilih dengan teliti
                    dan dipanggang secara presisi untuk menghasilkan cita rasa
                    yang autentik.
                </p>

                <a href="#news"
                    class="inline-block rounded-full border-2
                    border-[#F4AE52] px-8 py-3 font-semibold
                    text-[#F4AE52] hover:bg-[#F4AE52]
                    hover:text-[#6E3511]">
                    Pelajari Proses Kami
                </a>
            </div>
        </div>
    </section>

    <!-- Proses Pembuatan -->
    <section id="news" class="bg-[#211711] py-24 px-8 md:px-20">

        <div class="mx-auto max-w-7xl">
            <div class="text-center mb-16">
                <p class="text-sm tracking-[0.3em] text-[#F4AE52]
                    font-semibold mb-3">
                    DARI BIJI KE CANGKIR
                </p>

                <h2 class="text-4xl md:text-5xl font-bold">
                    Proses <span class="text-[#CC6F00]">Pembuatan</span>
                </h2>

                <p class="mt-4 text-lg text-orange-200 max-w-2xl mx-auto">
                    Kami memastikan setiap tahapan dilakukan dengan baik
                    untuk menghasilkan kualitas kopi yang konsisten.
                </p>
            </div>

            <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-3">

                <article class="border-t-4 border-[#F4AE52] pt-8">
                    <p class="text-5xl font-black text-white/20 mb-4">01</p>
                    <h3 class="text-2xl font-bold mb-3">Pemilihan Biji</h3>
                    <p class="text-orange-200 leading-relaxed">
                        Biji kopi dipilih dan disortir untuk menjaga kualitas
                        serta cita rasa kopi.
                    </p>
                </article>

                <article class="border-t-4 border-[#F4AE52] pt-8">
                    <p class="text-5xl font-black text-white/20 mb-4">02</p>
                    <h3 class="text-2xl font-bold mb-3">
                        Pemanggangan (Roasting)
                    </h3>
                    <p class="text-orange-200 leading-relaxed">
                        Biji kopi dipanggang dengan suhu yang sesuai
                        untuk menghasilkan aroma terbaik.
                    </p>
                </article>

                <article class="border-t-4 border-[#F4AE52] pt-8">
                    <p class="text-5xl font-black text-white/20 mb-4">03</p>
                    <h3 class="text-2xl font-bold mb-3">
                        Penyeduhan Presisi
                    </h3>
                    <p class="text-orange-200 leading-relaxed">
                        Barista meracik kopi dengan takaran yang tepat
                        agar rasa tetap konsisten.
                    </p>
                </article>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="border-t py-8 px-6 border-white/10 bg-[#1C120E]">
        <div class="mx-auto max-w-7xl flex flex-wrap
            items-center justify-between gap-4">

            <a href="#home" class="font-semibold text-white text-xl">
                Coffee<span class="text-[#F4AE52]">Break</span>
            </a>

            <p class="text-sm text-white/50">
                &copy; {{ date('Y') }} CoffeeBreak. Hak Cipta Dilindungi.
            </p>
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
                    currentQty--; // Kurangi 1
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