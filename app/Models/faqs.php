<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faqs extends Model
{
    use HasFactory;
    protected $fileable =  [
        'titre',
        'description'
    ];
}
