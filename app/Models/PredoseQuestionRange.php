<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PredoseQuestionRange extends Model
{
    use HasFactory;
    public $guarded = [];
    
    public function variableable()
    {
        return $this->morphTo();
    }
    // public function predoseSecondQuestion()
    // {
    //     return $this->belongsTo(PredoseSecondQuestion::class);
    // }

    public function illnessSub()
    {
        return $this->belongsTo(IllnessSub::class);
    }
}