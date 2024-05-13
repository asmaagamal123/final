<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class userss extends Authenticatable
{
    protected $table = 'custom_users';
    protected $guarded = ['id'];

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'custom_user_medicine')->withPivot('duration');
    }
}
