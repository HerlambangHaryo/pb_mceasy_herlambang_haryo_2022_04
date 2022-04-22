<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $softDelete = true;
    
    protected $fillable = [
        'nomor_induk',
        'nama',
        'tanggal_lahir',
        'alamat',
        'kota',
        'tanggal_bergabung',
        'akumulasi_cuti'
    ];
    
    protected $dates = ['deleted_at'];
}
