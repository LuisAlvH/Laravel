<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = [
        'client_id',
        'date',
        'diagnosis_id',
        'employee_id',
        'status'
    ];

    
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    
    public function diagnosis()
    {
        return $this->belongsTo(Diagnosis::class, 'diagnosis_id');
    }

    
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    
    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->date)->format('d/m/Y');
    }
}

