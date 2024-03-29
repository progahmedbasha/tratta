<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrclRange extends Model
{
    use HasFactory;

    public function illnessSub()
    {
        return $this->belongsTo(IllnessSub::class);
    }
}
