<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Location extends Pivot
{
    protected $table = 'location';
    public $incrementing = true;

    public function voiture() {
        return $this->belongsTo(Voiture::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
