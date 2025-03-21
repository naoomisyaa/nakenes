<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'jenis';   
    protected $primaryKey = 'id_jen';  
    public $incrementing = false; 
    protected $keyType = 'string'; 
    public $timestamps = false;
    protected $fillable = ['id_jen', 'nama_jen'];


}
