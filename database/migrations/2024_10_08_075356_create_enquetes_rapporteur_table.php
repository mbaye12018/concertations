<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquetesRapporteurTable extends Migration
{
    /**
     * Exécute les migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquete_rapporteurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('region_id'); // Clef étrangère vers 'regions'
            $table->unsignedBigInteger('departement_id'); // Clef étrangère vers 'departments'
            $table->unsignedBigInteger('secteur_id'); // Clef étrangère vers 'secteurs'
            
            // Vos autres champs
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phone');
            $table->string('email');
            $table->string('position')->nullable();
            $table->integer('service_quality');
            $table->text('service_feedback')->nullable();
            $table->text('reforms')->nullable();
            $table->text('citizen_involvement')->nullable();
            $table->text('additional_comments')->nullable();
            $table->timestamps();
        
            // Clés étrangères
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->foreign('departement_id')->references('id')->on('departements')->onDelete('cascade');
            $table->foreign('secteur_id')->references('id')->on('secteurs')->onDelete('cascade');
        });
        
    }

    /**
     * Annule les migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enquete_rapporteurs');
    }
}
