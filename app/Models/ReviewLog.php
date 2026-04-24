<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewLog extends Model
{
    protected $fillable = ['admin_id', 'review_id', 'action'];

    public function admin() {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function review() {
        return $this->belongsTo(Review::class);
    }
}