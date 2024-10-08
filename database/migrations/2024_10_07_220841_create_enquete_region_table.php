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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('position')->nullable();
            $table->string('service_quality');
            $table->text('service_feedback')->nullable();
            $table->text('reforms');
            $table->text('citizen_involvement')->nullable();
            $table->text('additional_comments')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('enquete_region');
    }
}
