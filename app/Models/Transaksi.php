<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
    protected $fillable = [
        'user_id',
        'barang_id',
        'jumlah',
        'keterangan',
        'jenis'
    ];

    protected $table = 'transaksi';

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
