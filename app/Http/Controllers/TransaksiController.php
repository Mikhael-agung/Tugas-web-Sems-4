<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    //
    public function formMasuk()
    {
        $barang = Barang::all();
        return view('transaksi.masuk', ['barang' => $barang]);
    }

    public function storeMasuk(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'required|string|max:255'
        ]);

        $barang = Barang::findOrFail($request->barang_id);
        $barang->stok += $request->jumlah;
        $barang->save();

        Transaksi::create([
            'user_id' => Auth::id(),
            'barang_id' => $barang->id,
            'jenis' => 'masuk',
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('transaksi.masuk')->with('success', 'strok berhasil ditambah');
    }

    public function formKeluar()
    {
        $barang = Barang::all();
        return view('transaksi.keluar', ['barang' => $barang]);
    }

    public function storeKeluar(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'required|string|max:255'
        ]);
        $barang = Barang::findOrFail($request->barang_id);
        if ($barang->stok < $request->jumlah) {
            return back()->withErrors(['jumlah' => 'stok tidak mencukupi']);
        }

        $barang->stok -= $request->jumlah;
        $barang->save();
        Transaksi::create([
            'user_id' => Auth::id(),
            'barang_id' => $barang->id,
            'jenis' => 'keluar',
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan
        ]);
        return redirect()->route('transaksi.keluar')->with('success', 'stok berhasil di kurangi');
    }
}
