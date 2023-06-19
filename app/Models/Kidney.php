<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kidney extends Model
{
    use HasFactory;

    public function illnessSub()
    {
        return $this->belongsTo(IllnessSub::class);
    }
}
