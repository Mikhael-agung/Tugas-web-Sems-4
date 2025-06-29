<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $fillable = ['nama', 'kode', 'stok', 'deskripsi'];

    public function transaksi (){
        return $this->hasMany(Transaksi::class);
    }
}
