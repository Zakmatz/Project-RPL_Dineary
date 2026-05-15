<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'admin_id';

    protected $fillable = [
    'name', 'username', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function reviewLogs() {
        return $this->hasMany(ReviewLog::class, 'admin_id', 'admin_id');
    }

    public function getRole()
    {
        return 'admin';
    }
}