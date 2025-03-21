<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    // use HasFactory;

    protected $table = 'penjualan';   
    protected $primaryKey = 'id_jual';  
    public $incrementing = false; 
    protected $keyType = 'string'; 
    public $timestamps = false;
    protected $fillable = ['id_jual', 'tanggal_jual', 'totalharga_jual'];

    public function detailPenjualan()
    {
        return $this->hasMany(PenjualanDetail::class, 'id_jual');
    }

}
