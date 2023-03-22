<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugPregnancyStage extends Model
{
    use HasFactory;
    public function drugPregnancy()
    {
        return $this->belongsTo(DrugPregnancy::class);
    }
    public function pregnancyStage()
    {
        return $this->belongsTo(PregnancyStage::class);
    }
}