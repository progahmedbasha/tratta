<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugTrade extends Model
{
    use HasFactory;

    public function drug()
    {
        return $this->belongsTo(Drug::class);
    }
    public function tradeKey()
    {
        return $this->belongsTo(TradeKey::class);
    }
}