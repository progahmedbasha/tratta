<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteDose extends Model
{
    use HasFactory;
    public function effect()
    {
        return $this->belongsTo(Effect::class);
    }
    public function doseMessage()
    {
        return $this->hasMany(DoseMessage::class);
    }
    public function noteMessage()
    {
        return $this->hasMany(NoteMessage::class);
    }
    public function noteDoseVariables()
    {
        return $this->hasMany(NoteDoseVariable::class);
    }
}