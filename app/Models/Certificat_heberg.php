<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificat_heberg extends Model
{
    use HasFactory;
    protected $fileable =  [
        'document_id',       
        'name_demandeur',
        'email_demandeur',
        'num_demandeur', 
        'profession_demandeur', 
        'domicile_demandeur', 
        'provenance', 
        'dure_sejour', 
        'date_debut', 
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
