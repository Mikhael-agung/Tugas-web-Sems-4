<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $fillable = ['nama', 'kode', 'stok', 'deskripsi'];

    protected $table = 'barangs';
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function scopeFilter($query, $search)
    {
        if ($search) {
            $search = strtolower($search);
            $query->where(function ($q) use ($search) {
                $q->whereRaw('LOWER(nama) LIKE ?', ["%{$search}%"])
                    ->orWhereRaw('LOWER(kode) LIKE ?', ["%{$search}%"]);
            });
        }

        return $query;
    }
}
