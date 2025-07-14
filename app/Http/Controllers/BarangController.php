<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\LogAktivitas;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\CssSelector\Node\FunctionNode;

use function PHPUnit\Framework\returnSelf;

class BarangController extends Controller
{
    //
    public function index(Request $request)
    {
        // $barangs = Barang::all(); //ambil semua barang
        // return view('barang.index', ['barangs' => $barangs]);
        $barangs = Barang::filter($request->query('search'))->get();
        return view('barang.index', compact('barangs'));
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
        $barang = Barang::create($request->all());
        LogAktivitas::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name,
            'aksi' => 'Tambah barang',
            'keterangan' => "Menambahkan barang '{$barang->nama}' (kode: {$barang->kode}) dengan stok awal {$barang->stok}"
        ]);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'kode' => 'required|unique:barangs,kode,' . $id,
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
        ]);
        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        LogAktivitas::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name,
            'aksi' => 'Update Barang',
            'keterangan' => "Mengedit barang '{$barang->nama}' (kode: {$barang->kode}). stok sekarang: ($barang->stok}."
        ]);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil di update!');
    }
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', ['barang' => $barang]);
    }
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        LogAktivitas::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name,
            'aksi' => 'Hapus Barang',
            'keterangan' => "Menghapus barang '{$barang->nama}' (kode: {$barang->kode})"
        ]);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil di hapus!');
    }
}
