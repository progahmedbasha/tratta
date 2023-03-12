<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IllnessCategory extends Model
{
    use HasFactory;
    public function parent()
    {
        return $this->belongsTo(IllnessCategory::class,'parent_id');
    }

    public function child()
    {
        return $this->hasMany(IllnessCategory::class,'parent_id');
    }
    public function subCategory()
    {
        return $this->child()->with('subCategory');
    }
    public function variables()
    {
        return $this->morphMany(VariableDetail::class, 'optionable');
    }
}