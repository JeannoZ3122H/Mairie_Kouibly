<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretariat extends Model
{
    use HasFactory;

    protected $fileable =  [
        'image',
        'responsable',
        'description'
    ];
}
