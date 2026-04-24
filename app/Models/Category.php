<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function cafes() {
        return $this->belongsToMany(Cafe::class, 'cafe_categories');
    }
}