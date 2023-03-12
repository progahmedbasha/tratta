<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightGender extends Model
{
    use HasFactory;
    public function Weight()
    {
        return $this->belongsTo(Weight::class);
    }
    public function Gender()
    {
        return $this->belongsTo(Gender::class);
    }
}