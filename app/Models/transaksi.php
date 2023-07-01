<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    public function outlet()
    {
        return $this->belongsTo(outlet::class, 'outlet_id');
    }
    public function member()
    {
        return $this->belongsTo(member::class, 'member_id');
    }
    public function paket()
    {
        return $this->belongsTo(paket::class, 'paket_id');
    }
    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }
    public function transaksiDetail()
    {
        return $this->hasMany(transaksi_detail::class, 'transaksi_id');
    }
}
