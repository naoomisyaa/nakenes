<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';  
    protected $primaryKey = 'id_bar';  
    public $incrementing = false;  
    protected $keyType = 'string'; 
    protected $fillable = ['id_bar', 'nama_bar', 'id_jen', 'id_merk', 'harga', 'stok_bar'];

    

    public function kurangiStok($jumlah)
    {
        $this->decrement('stok_bar', $jumlah);
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'id_jen', 'id_jen');
    }

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'id_merk', 'id_merk');
    }

    public function scopeHabis($query)
    {
        return $query->where('stok_bar', 0);
    }
}
