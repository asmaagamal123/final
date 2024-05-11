<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = ['name', 'type', 'duration', 'hours_left', 'last_time_taken', 'is_done'];
}

