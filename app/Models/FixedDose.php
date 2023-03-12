<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixedDose extends Model
{
    use HasFactory;
    public function effect()
    {
        return $this->belongsTo(Effect::class);
    }
}