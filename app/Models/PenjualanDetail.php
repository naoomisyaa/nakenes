<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenjualanDetail extends Model
{
    protected $table = 'penjualan_detail';   
    protected $primaryKey = 'id_pd';  
    public $incrementing = false; 
    protected $keyType = 'string'; 
    public $timestamps = false;
    protected $fillable = ['id_pd','id_jual', 'id_bar', 'jumlah'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_bar', 'id_bar');
    }

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'id_jual', 'id_jual');
    }
}

