<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatHebergsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificat_hebergs', function (Blueprint $table) {
            $table->id();
            $table->integer('document_id')->unsigned();
            $table->string('name_demandeur')->nullable();
            $table->string('email_demandeur')->nullable();
            $table->string('num_demandeur')->nullable();
            $table->string('profession_demandeur')->nullable();
            $table->string('domicile_demandeur')->nullable();
            $table->string('provenance')->nullable();
            $table->string('dure_sejour')->nullable();
            $table->string('date_debut')->nullable();
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
        Schema::dropIfExists('certificat_hebergs');
    }
}
