<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi_detail extends Model
{
    use HasFactory;
    protected $table = 'transaksi_detail';
    protected $primaryKey = 'id_detail';

    public function transaksi()
    {
        return $this->hasMany(transaksi::class, 'transaksi_id');
    }

    public function paket()
    {
        return $this->belongsTo(paket::class, 'paket_id');
    }
}
