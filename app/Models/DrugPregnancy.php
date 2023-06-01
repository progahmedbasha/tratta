<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugPregnancy extends Model
{
    use HasFactory;

    public function safety()
    {
        return $this->belongsTo(PregnancySafety::class,'pregnancy_safety_id');
    }
    
    public function drugPregnancyStage()
    {
        return $this->hasMany(DrugPregnancyStage::class);
    }
}