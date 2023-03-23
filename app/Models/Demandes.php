<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demandes extends Model
{
    use HasFactory;

    protected $fileable =  [
        'document_id',
        'full_name',
        'num_extrait',
        'email_demandeur',
        'num_demandeur', 
        'nbre_copie',
        'montant',
        'lieu_livraison',
        'extrait_file',
        'montant_livraison',
        'adresse_livraison',
        'status_debut_traitement',
        'status_livrable'
    ];
}
