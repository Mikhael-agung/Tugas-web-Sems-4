<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Barang::create([
            'kode' => 'BRG001',
            'nama' => 'Kabel HDMI',
            'stok' => 25,
            'deskripsi' => 'Kabel HDMI 1.5 meter untuk koneksi TV ke laptop.',
        ]);

        Barang::create([
            'kode' => 'BRG002',
            'nama' => 'Mouse Wireless',
            'stok' => 40,
            'deskripsi' => 'Mouse wireless 2.4 GHz, baterai tahan lama.',
        ]);

        Barang::create([
            'kode' => 'BRG003',
            'nama' => 'Adaptor USB-C',
            'stok' => 15,
            'deskripsi' => 'Adaptor USB-C ke HDMI untuk perangkat modern.',
        ]);

        Barang::create([
            'kode' => 'BRG004',
            'nama' => 'Kabel LAN 5m',
            'stok' => 30,
            'deskripsi' => 'Kabel jaringan CAT6 untuk koneksi stabil.',
        ]);

        Barang::create([
            'kode' => 'BRG005',
            'nama' => 'Flashdisk 32GB',
            'stok' => 50,
            'deskripsi' => 'Flashdisk USB 3.0 kecepatan tinggi.',
        ]);
    }
}
