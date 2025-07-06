<?php

namespace App\Http\Controllers;

use App\Models\LogAktivitas;
use Illuminate\Http\Request;

class LogAktivitasController extends Controller
{
    public function index()
    {
        $Log = LogAktivitas::latest()->paginate(15);
        return view('log.aktivitas', ['logs' => $Log]);
    }
}
