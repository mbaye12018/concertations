<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departements', function (Blueprint $table) {
            $table->id(); // Clé primaire
            $table->string('nom'); // Nom du département
            $table->unsignedBigInteger('region_id'); // Clé étrangère vers la table régions

            // Clé étrangère pour relier aux régions
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            
            $table->timestamps(); // Colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departements');
    }
}
