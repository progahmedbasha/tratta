<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugFormula extends Model
{
    use HasFactory;
    public function drug()
    {
        return $this->belongsTo(Drug::class);
    }
    public function formula()
    {
        return $this->belongsTo(Formula::class);
    }
 
}