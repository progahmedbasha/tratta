<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Predose extends Model
{
    use HasFactory;
    public function predoseVariable()
    {
        return $this->hasMany(PredoseVariable::class);
    }
}