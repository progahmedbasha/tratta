<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugPregnancy extends Model
{
    use HasFactory;
    public function effect()
    {
        return $this->belongsTo(Effect::class);
    }
    public function drugPregnancyStage()
    {
        return $this->hasMany(DrugPregnancyStage::class);
    }
}