<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForbiddenCase extends Model
{
    use HasFactory;
    public function forbiddenCaseValue()
    {
        return $this->hasMany(ForbiddenCaseValue::class);
    }
}