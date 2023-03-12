<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class,'sub_cat_id');
    }
    public function variables()
    {
        return $this->morphMany(Variable::class, 'variableable');
    }
}