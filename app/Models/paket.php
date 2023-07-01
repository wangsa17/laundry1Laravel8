<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paket extends Model
{
    use HasFactory;
    protected $table = 'paket';
    protected $primaryKey = 'id_paket';

    public function outlet()
    {
        return $this->belongsTo(outlet::class, 'outlet_id');
    }
    public function transaksi_detail()
    {
        return $this->hasMany(transaksi_detail::class, 'paket_id', 'id_paket');
    }
    public function transaksi()
    {
        return $this->hasMany(transaksi::class, 'paket_id', 'id_paket');
    }
}
