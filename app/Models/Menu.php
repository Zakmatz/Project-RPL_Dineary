<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['cafe_id', 'name', 'price', 'description'];

    public function cafe() {
        return $this->belongsTo(Cafe::class);
    }
}