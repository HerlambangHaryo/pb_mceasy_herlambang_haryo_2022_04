<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Paidleavereason;
use App\Models\Employee;

class Paidleave extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $softDelete = true;
    
    protected $fillable = [
        'employee_id',
        'tanggal_awal', 
        'tanggal_akhir', 
        'lama_cuti', 
        'paidleavereason_id', 
        'keterangan'
    ];
    
    protected $dates = ['deleted_at'];

    public function paidleavereason()
    {
        return $this->belongsTo(Paidleavereason::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
