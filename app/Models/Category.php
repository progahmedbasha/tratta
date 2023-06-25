<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $guarded = [];
    
    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }
    public function child()
    {
        return $this->hasMany(Category::class,'parent_id');
    }
    // public function subCategory()
    // {
    //     return $this->child()->with('subCategory');
    // }
    public function drug()
    {
        return $this->hasMany(Drug::class, 'sub_cat_id');
    }
}