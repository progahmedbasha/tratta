<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
    use HasFactory;
    public $guarded = [];
    public function variables()
    {
        return $this->morphMany(VariableDetail::class, 'optionable');
    }
}