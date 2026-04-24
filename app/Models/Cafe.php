<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    protected $fillable = [
        'name', 'address', 'description', 
        'phone', 'open_hours', 'price_range', 'photo'
    ];

    public function categories() {
        return $this->belongsToMany(Category::class, 'cafe_categories');
    }

    public function menus() {
        return $this->hasMany(Menu::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function bookmarks() {
        return $this->hasMany(Bookmark::class);
    }

    public function averageRating() {
        return $this->reviews()->avg('rating');
    }
}