<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socio_cult extends Model
{
    use HasFactory;
    protected $fileable =  [
        'image',
        'responsable',
        'description'
    ];
}
