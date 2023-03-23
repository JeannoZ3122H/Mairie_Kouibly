<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autorisation_parentale extends Model
{
    use HasFactory;
    protected $fileable =  [
        'document_id',
        'full_name',
        'profession',
        'domicile',
        'lieu_naissance',
        'date_naissance',
        'name_demandeur',
        'email_demandeur',
        'num_demandeur', 
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
