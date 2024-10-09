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
            $table->string('name');
            $table->string('service_point');
            $table->string('contact');
            $table->string('fonction')->nullable();
            $table->integer('service_quality');
            $table->text('accessible')->nullable();
            $table->text('obstacle')->nullable();
            $table->text('service_long')->nullable();
            $table->text('service_efficace')->nullable();
            $table->text('service_modernise')->nullable();
            $table->text('service_outils')->nullable();
            $table->text('reformes')->nullable();
            $table->text('ameliorer_services')->nullable();
            $table->text('transparence_responsabilite')->nullable();
            $table->text('accessibilite_services')->nullable();
            $table->text('simplification_procedures')->nullable();
            $table->text('coordination_services')->nullable();
            $table->text('technologies_numeriques')->nullable();
            $table->text('formation_agents')->nullable();
            $table->text('association_citoyens')->nullable();
            $table->text('outils_participation')->nullable();
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
