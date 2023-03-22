<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HxDrug extends Model
{
    use HasFactory;
    public function hxDrugValue()
    {
        return $this->hasMany(HxDrugValue::class);
    }
    public function interactionSeverity()
    {
        return $this->belongsTo(InteractionSeverity::class);
    }
}