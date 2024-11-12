<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    
    protected $table = 'pets';

    
    protected $fillable = [
        'name',
        'species',
        'race',
        'date_of_birth',
        'client_id',
    ];

    
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function diagnosis()
    {
        return $this->hasMany(Diagnosis::class, 'pet_id');
    }
}

