<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interaction extends Model
{
    protected $fillable = ['medicine_id_1', 'medicine_id_2', 'description'];
}