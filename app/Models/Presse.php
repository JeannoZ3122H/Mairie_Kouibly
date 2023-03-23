<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presse extends Model
{
    use HasFactory;
    protected $fileable =  [
        'image',
        'titre',
        'url_presse'
    ];
}
