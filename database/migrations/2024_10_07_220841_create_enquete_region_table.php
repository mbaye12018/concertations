<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnqueteRegionTable extends Migration
{
    public function up()
    {
        Schema::create('enquete_region', function (Blueprint $table) {
            $table->id();
            $table->foreignId('region_id')->constrained('regions')->onDelete('cascade'); // Foreign key vers la table régions
            $table->foreignId('department_id')->constrained('departements')->onDelete('cascade'); // Foreign key vers la table départements
            $table->foreignId('secteur_id')->constrained('secteurs')->onDelete('cascade'); // Foreign key vers la table secteurs
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
        
          
        });
    }

    public function down()
    {
        Schema::dropIfExists('enquete_region');
    }
}
