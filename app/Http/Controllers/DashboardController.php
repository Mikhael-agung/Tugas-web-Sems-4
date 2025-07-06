<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $barangCount = Barang::count();
        $stokMenipis = Barang::where('stok', '<=', 10)->count();
        return view('dashboard', ['barangCount' => $barangCount,'stokMenipis' => $stokMenipis]);
    }
}
