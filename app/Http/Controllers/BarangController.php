<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

use function PHPUnit\Framework\returnSelf;

class BarangController extends Controller
{
    //
    public function index()
    {
        $barangs = Barang::all(); //ambil semua barang
        return view('barang.index', ['barangs' => $barangs]);
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:100|unique:barangs,kode',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
        ]);
        Barang::create($request->all());
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'kode' => 'required|unique:barangs,kode,' . $id,
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullalbe|string',
        ]);
        $barang = Barang::findOrFail($id);
        $barang->update($request->all());
        return redirect()->route('barang.index')->with('success', 'Barang berhasil di update!');
    }
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil di hapus!');
    }
}
