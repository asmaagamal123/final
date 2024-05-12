<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    
    public function conflictingMaterials()
    {
        return $this->hasMany(ConflictingMaterial::class);
    }

    public function users()
{
    return $this->belongsToMany(User::class)->withPivot('duration');
}
}

