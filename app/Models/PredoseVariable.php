<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PredoseVariable extends Model
{
    use HasFactory;
    public $guarded = [];
    public function variableable()
    {
        return $this->morphTo();
    }
       public function predose()
    {
        return $this->belongsTo(Predose::class);
    }
    public function age()
    {
        return $this->belongsTo(Age::class,'variableable_id');
    }
    public function weight()
    {
        return $this->belongsTo(Weight::class,'variableable_id');
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class,'variableable_id');
    }
    public function pregnancyStage()
    {
        return $this->belongsTo(PregnancyStage::class,'variableable_id');
    }
    public function illnessSub()
    {
        return $this->belongsTo(IllnessSub::class,'variableable_id');
    }
    public function drug()
    {
        return $this->belongsTo(Drug::class,'variableable_id');
    }
}