<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class  TransaksiController extends Controller
{
    // Menampilkan semua barang (dengan search opsional)
    public function masuk(Request $request)
    {
        $search = $request->input('search');
        $barangs = Barang::when($search, function ($query, $search) {
                return $query->where('nama_barang', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10); // pagination biar rapi

        return view('barang.index', compact('barangs', 'search'));
    }

     public function Keluar(){
        $barang = Barang::all();
        return view('transaksi.keluar', ['barang' => $barang]);
    }


    // Menampilkan form tambah barang
    public function create()
    {
        return view('barang.create');
    }

    // Menyimpan data barang baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
        ]);

        Barang::create($request->only('nama_barang', 'stok'));

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    // Menampilkan form edit barang
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    // Mengupdate data barang
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->only('nama_barang', 'stok'));

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate!');
    }

    // Menghapus barang
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}
