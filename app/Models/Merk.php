<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    protected $table = 'merk';   
    protected $primaryKey = 'id_merk';  
    public $incrementing = false; 
    protected $keyType = 'string'; 
    public $timestamps = false;
    protected $fillable = ['id_merk', 'nama_merk'];

}
