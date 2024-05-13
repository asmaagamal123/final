<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $table = 'custom_medicines';
    protected $fillable = ['name', 'type', 'duration'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'custom_user_medicine')->withPivot('duration');
    }
}
