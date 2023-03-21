<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    use HasFactory;
     public $guarded = [];
    public function variableable()
    {
        return $this->morphTo();
    }
    public function drug()
    {
        return $this->belongsTo(Drug::class,'variableable_id');
    }
    public function drugIndication()
    {
        return $this->belongsTo(DrugIndication::class,'variableable_id');
    }

    public function variableDetails()
    {
        return $this->hasMany(VariableDetail::class);
    }
    public function noteDose()
    {
        return $this->hasMany(NoteDose::class);
    }
}