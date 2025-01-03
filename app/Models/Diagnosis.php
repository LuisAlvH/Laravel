<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;

    protected $table = 'diagnosis';

     
    protected $fillable = [
        'date',
        'description',
        'pet_id',
    ];

  
    public function pet()
{
    return $this->belongsTo(Pet::class, 'pet_id'); //
}
}

