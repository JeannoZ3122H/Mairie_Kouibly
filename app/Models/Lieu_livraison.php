<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lieu_livraison extends Model
{
    use HasFactory;

    protected $fileable =  [
        'lieu',
        'montant',
    ];
}
