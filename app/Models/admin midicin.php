<?php
// app/Models/Medicine.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = ['name', 'dosage', 'side_effects'];
}
