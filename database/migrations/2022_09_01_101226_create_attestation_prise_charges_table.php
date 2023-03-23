<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttestationPriseChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attestation_prise_charges', function (Blueprint $table) {
            $table->id();
            $table->integer('document_id')->unsigned();
            $table->string('full_name')->nullable();
            $table->string('lieu_naissance')->nullable();
            $table->string('date_naissance')->nullable();
            $table->string('name_demandeur')->nullable();
            $table->string('email_demandeur')->nullable();
            $table->string('num_demandeur')->nullable();
            $table->string('profession_demandeur')->nullable();
            $table->string('domicile_demandeur')->nullable();
            $table->string('nbre_copie')->nullable();
            $table->integer('montant_timbre')->nullable();
            $table->integer('montant_livraison')->nullable();
            $table->string('lieu_livraison')->nullable();
            $table->string('adresse_livraison')->nullable();
            $table->string('extrait_file')->nullable();
            $table->boolean('status_debut_traitement')->default(0);
            $table->string('status_livrable')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attestation_prise_charges');
    }
}
