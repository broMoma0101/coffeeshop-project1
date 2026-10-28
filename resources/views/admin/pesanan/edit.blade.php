<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan | Admin CoffeeBreak</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans p-6 md:p-12">
    <div class="max-w-2xl mx-auto">
        
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Pesanan</h1>
            <p class="text-gray-500">Perbarui data pesanan dari <span class="font-semibold">{{ $pesanan->nama }}</span></p>
        </div>

        <!-- Menampilkan pesan error validasi -->
        @if ($errors->any())
            <div class="mb-6 rounded-lg bg-red-500 p-4 text-white shadow-md">
                <ul class="list-disc pl-5 font-medium">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- TAG FORM UTAMA: Membungkus SEMUA input -->
        <form action="{{ route('pesanan.update', $pesanan->id) }}" method="POST" class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
            @csrf
            @method('PUT') <!-- Wajib untuk proses update data di Laravel -->

            <div class="mb-5">
                <label for="nama" class="block text-gray-700 font-semibold mb-2">Nama Pelanggan</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $pesanan->nama) }}" class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-1 focus:ring-black outline-none transition" required>
            </div>

            <div class="mb-5">
                <label for="nomor_hp" class="block text-gray-700 font-semibold mb-2">No. HP / WhatsApp</label>
                <input type="text" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp', $pesanan->nomor_hp) }}" class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-1 focus:ring-black outline-none transition" required>
            </div>

            <div class="mb-5">
                <label for="pesanan" class="block text-gray-700 font-semibold mb-2">Detail Pesanan</label>
                <textarea id="pesanan" name="pesanan" rows="3" class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-1 focus:ring-black outline-none transition bg-gray-50" required readonly>{{ old('pesanan', $pesanan->pesanan) }}</textarea>
                <p class="text-xs text-gray-400 mt-1">*Detail pesanan diisi otomatis oleh pelanggan.</p>
            </div>

            <hr class="my-8 border-gray-200">

            <div class="mb-5">
                <label for="total_harga" class="block text-gray-900 font-bold mb-2 ">Total Harga (Rp)</label>
                <input type="number" id="total_harga" name="total_harga" value="{{ old('total_harga', $pesanan->total_harga) }}" class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-1 focus:ring-black outline-none transition bg-gray-50 font-bold text-lg" placeholder="Contoh: 112000">
            </div>

            <div class="mb-8">
                <label for="status" class="block text-gray-900 font-bold mb-2">Status Pembayaran</label>
                <select id="status" name="status" class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-1 focus:ring-black bg-gray-50 outline-none transition font-semibold" required>
                    <option value="Belum Bayar" {{ old('status', $pesanan->status) == 'Belum Bayar' ? 'selected' : '' }}>🔴 Belum Bayar</option>
                    <option value="Sudah Bayar" {{ old('status', $pesanan->status) == 'Sudah Bayar' ? 'selected' : '' }}>🟢 Sudah Bayar</option>
                </select>
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('pesanan.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-xl hover:bg-gray-200 transition">Kembali</a>
                <button type="submit" class="px-8 py-3 bg-[#CC6F00] text-white font-bold rounded-xl hover:bg-[#b05f00] hover:scale-105 transition shadow-lg">Simpan Perubahan</button>
            </div>
        </form>

    </div>
</body>
</html>