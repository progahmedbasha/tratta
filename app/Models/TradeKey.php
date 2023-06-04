<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeKey extends Model
{
    use HasFactory;
    public function drugTrade()
    {
        return $this->hasMany(DrugTrade::class);
    }
}