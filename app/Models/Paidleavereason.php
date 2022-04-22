<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paidleavereason extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $softDelete = true;
    
    protected $fillable = [
        'nama'
    ];
    
    protected $dates = ['deleted_at'];
}
