<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrugInteraction extends Model
{
    protected $fillable = ['medicine_id', 'interacting_drug_name'];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
