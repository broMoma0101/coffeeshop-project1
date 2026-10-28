<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan | CoffeeBreak</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Segoe UI', sans-serif; }
        .coffee-bg {
            background: radial-gradient(circle at top right, #8b4b20, transparent 35%), #f8f3ed;
        }
        .order-row { transition: background .2s ease; }
        .order-row:hover { background: #fff8ef; }
        .coffee-btn { transition: all .2s ease; }
        .coffee-btn:hover { transform: translateY(-2px); }
    </style>
</head>

<body class="coffee-bg min-h-screen text-[#3D2616]">

    <!-- Navbar -->
    <nav class="sticky top-0 z-20 bg-[#6E3511]/95 backdrop-blur-md
                border-b border-white/10 shadow-lg">
        <div class="max-w-7xl mx-auto px-5 md:px-10 py-4
                    flex justify-between items-center">
            <a href="{{ route('home') }}"
               class="text-2xl font-extrabold tracking-wide text-white">
                Coffee<span class="text-[#F4AE52]">Break</span>
            </a>
            <a href="{{ route('home') }}"
               class="flex items-center gap-2 rounded-full bg-[#CC6F00]
                      hover:bg-[#b05f00] px-4 py-2.5 text-sm font-bold
                      text-white shadow-md transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" d="M15 19l-7-7 7-7M8 12h13"/>
                </svg>
                <span class="hidden sm:inline">Halaman Home</span>
                <span class="sm:hidden">Kembali</span>
            </a>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- Header -->
        <header class="mb-8">
            <p class="text-sm font-bold tracking-[.25em] text-[#F4AE52] mb-3">
                COFFEEBREAK MANAGEMENT
            </p>
            <h1 class="text-3xl md:text-4xl font-black text-[#3D2616]">
                Daftar Pesanan
            </h1>
            <p class="mt-3 text-sm md:text-base text-[#FEFAF3]">
                Kelola pesanan pelanggan CoffeeBreak dengan mudah dan praktis.
            </p>
        </header>

        <!-- Notifikasi -->
        @if (session('success'))
            <div class="mb-6 flex items-center gap-3 rounded-2xl
                        border border-green-200 bg-green-50 p-4 text-green-800">
                <span class="flex h-9 w-9 items-center justify-center
                             rounded-full bg-green-100 text-lg">✓</span>
                <div>
                    <p class="font-bold">Berhasil!</p>
                    <p class="text-sm">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-2xl border border-red-200
                        bg-red-50 p-4 text-sm text-red-700">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- Statistik -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-8">
            <div class="relative overflow-hidden rounded-2xl bg-[#6E3511]
                        p-6 text-white shadow-lg">
                <div class="absolute -right-5 -top-8 h-32 w-32
                            rounded-full bg-white/5"></div>
                <div class="relative flex items-center justify-between">
                    <div>
                        <p class="text-sm text-orange-200">Total Pesanan</p>
                        <h2 class="mt-2 text-4xl font-black">
                            {{ $pesanans->count() }}
                        </h2>
                        <p class="mt-2 text-xs text-orange-100">
                            Data pesanan tersedia
                        </p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center
                                rounded-2xl bg-[#F4AE52] text-[#3D2616]">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="1.8"
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 14l2 2 4-4"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-[#ead9c6] bg-white
                        p-6 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-[#866950]">Pesanan Terbaru</p>
                        <h2 class="mt-3 text-xl font-extrabold text-[#6E3511]">
                            @if ($pesanans->isNotEmpty())
                                {{ $pesanans->max('created_at')->format('d M Y') }}
                            @else
                                Belum ada pesanan
                            @endif
                        </h2>
                        <p class="mt-2 text-xs text-[#a18b76]">
                            Tanggal pesanan terbaru
                        </p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center
                                rounded-2xl bg-[#fff0d8] text-[#CC6F00]">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="1.8"
                                  d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Pesanan -->
        <section class="overflow-hidden rounded-2xl border border-[#ead9c6]
                        bg-white shadow-lg shadow-[#6E3511]/5">

            <div class="flex flex-col sm:flex-row sm:items-center
                        sm:justify-between gap-3 border-b border-[#f1e6da]
                        px-5 md:px-7 py-5">
                <div>
                    <h2 class="text-lg font-extrabold text-[#3D2616]">
                        Semua Pesanan
                    </h2>
                    <p class="mt-1 text-sm text-[#a18b76]">
                        Informasi pelanggan dan detail pemesanan.
                    </p>
                </div>
                <span class="self-start rounded-full bg-[#fff0d8] px-4 py-2
                             text-xs font-bold text-[#9b5100]">
                    {{ $pesanans->count() }} pesanan
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[850px] text-left">
                    <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Pelanggan</th>
                        <th class="px-6 py-4">Pesanan</th>
                        <th class="px-6 py-4">Total Harga</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($pesanans as $index => $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 font-semibold">{{ $item->nama }} <br><span class="text-sm text-gray-500">{{ $item->nomor_hp }}</span></td>
                            <td class="px-6 py-4">{{ $item->pesanan }}</td>
                            <td class="px-6 py-4 font-bold text-gray-700">
                                {{ $item->total_harga ? 'Rp ' . number_format($item->total_harga, 0, ',', '.') : 'Belum diisi' }}
                            </td>
                            <td class="px-6 py-4">
                                @if($item->status == 'Sudah Bayar')
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">Sudah Bayar</span>
                                @else
                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold">Belum Bayar</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 flex justify-center gap-3">
                                <a href="{{ route('pesanan.edit', $item->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded shadow transition text-sm">Edit</a>
                                <form action="{{ route('pesanan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesanan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded shadow transition text-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-500 font-medium">Belum ada pesanan masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
                </table>
            </div>

        </section>
       
    </main>
</body>
</html>
```