<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipalite extends Model
{
    use HasFactory;

    protected $fileable = ['full_name', 'image'];
}
