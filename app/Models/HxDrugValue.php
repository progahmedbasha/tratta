<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HxDrugValue extends Model
{
    use HasFactory;
    public function hxDrug()
    {
        return $this->belongsTo(HxDrug::class);
    }
    public function drug()
    {
        return $this->belongsTo(Drug::class);
    }
}