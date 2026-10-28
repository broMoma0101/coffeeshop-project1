<?php
namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Menu; 
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function create()
    {
        $menus = Menu::all();
        return view('coffeebreak', compact('menus')); 
    }

    public function daftarMenu()
    {
        $menus = Menu::all();
        return view('menu', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:20',
            'menu_ids' => 'required|array',
        ]);

        $detailPesanan = [];
        $totalHarga = 0;

        foreach ($request->menu_ids as $menuId) {
            $menu = Menu::find($menuId);
            $jumlah = $request->jumlah[$menuId] ?? 1; 
            
            if ($menu && $jumlah > 0) {
                $totalHarga += ($menu->harga * $jumlah);
                $detailPesanan[] = "{$jumlah}x {$menu->nama}";
            }
        }

        $teksPesanan = implode(', ', $detailPesanan);

        Pesanan::create([
            'nama' => $request->nama,
            'nomor_hp' => $request->nomor_hp,
            'pesanan' => $teksPesanan,
            'total_harga' => $totalHarga,
            'status' => 'Belum Bayar'
        ]);

        return redirect()->route('home')->with('success', 'Pesanan berhasil dibuat! Silakan buka menu Cek Tagihan untuk membayar.');
    }

    public function formCekPesanan()
    {
        return view('cek-pesanan');
    }

    public function prosesCekPesanan(Request $request)
    {
        $request->validate(['nomor_hp' => 'required']);

        $pesanan = Pesanan::where('nomor_hp', $request->nomor_hp)->latest()->first();

        if (!$pesanan) {
            return back()->with('error', 'Nomor HP tidak ditemukan atau belum ada pesanan.');
        }

        return redirect()->route('pesanan.pembayaran', $pesanan->id);
    }

    public function index()
    {
        $pesanans = Pesanan::latest()->get();
        return view('admin.pesanan.index', compact('pesanans'));
    }

    public function edit(Pesanan $pesanan)
    {
        return view('admin.pesanan.edit', compact('pesanan'));
    }

    public function update(Request $request, Pesanan $pesanan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:20',
            'pesanan' => 'required|string',
            'total_harga' => 'nullable|numeric',
            'status' => 'required|in:Belum Bayar,Sudah Bayar',
        ]);

        $pesanan->update($request->all());

        return redirect()->route('pesanan.index')->with('success', 'Data pesanan berhasil diperbarui!');
    }

    public function destroy(Pesanan $pesanan)
    {
        $pesanan->delete();

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dihapus!');
    }

    public function pembayaran(Pesanan $pesanan)
    {
        return view('pembayaran', compact('pesanan'));
    }
}