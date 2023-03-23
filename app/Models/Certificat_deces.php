<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificat_deces extends Model
{
    use HasFactory;
    protected $fileable =  [
        'document_id',
        'full_name',
        'profession_defunt',
        'lieu_naissance',
        'date_deces',
        'lieu_deces',
        'name_pere',
        'domicile_pere',
        'name_mere',
        'domicile_mere',
        'name_declarant',
        'email_declarant',
        'num_declarant', 
        'lieu_livraison',
        'adresse_livraison',
        'nbre_copie',
        'montant',
        'extrait_file',
        'montant_livraison',
        'status_debut_traitement',
        'status_livrable'
    ];
}
