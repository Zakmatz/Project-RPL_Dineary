<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'user_id';

    protected $fillable = [
    'name',
    'username',
    'email',
    'password',
    'bio',
    'foto_user',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function reviews() {
        return $this->hasMany(Review::class, 'user_id', 'user_id');
    }

    public function bookmarks() {
        return $this->hasMany(Bookmark::class, 'user_id', 'user_id');
    }
}