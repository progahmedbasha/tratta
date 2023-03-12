<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariableDetail extends Model
{
    use HasFactory;
    public $guarded = [];
    public function effect()
    {
        return $this->belongsTo(Effect::class);
    }
    public function optionable()
    {
        return $this->morphTo();
    }
    public function age()
    {
        return $this->belongsTo(age::class,'optionable_id');
    }
    public function weight()
    {
        return $this->belongsTo(Weight::class,'optionable_id');
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class,'optionable_id');
    }
    public function pregnancyStage()
    {
        return $this->belongsTo(PregnancyStage::class,'optionable_id');
    }
    public function illnessCategory()
    {
        return $this->belongsTo(IllnessCategory::class,'optionable_id');
    }
}