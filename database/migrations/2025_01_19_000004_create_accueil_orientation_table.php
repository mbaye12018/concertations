<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccueilOrientationTable extends Migration
{
    public function up()
    {
        Schema::create('accueil_orientation', function (Blueprint $table) {
            $table->bigIncrements('id_accueil');
            $table->unsignedBigInteger('id_soumission');

            $table->string('evaluation_accueil', 50);
            $table->text('pourquoi_accueil');
            $table->boolean('signaletique_claire'); // 1=Oui, 0=Non
            $table->boolean('bonne_orientation');   // 1=Oui, 0=Non
            $table->text('suggestions_accueil');

            $table->timestamp('date_insertion')->useCurrent();

            $table->foreign('id_soumission')
                  ->references('id_soumission')
                  ->on('soumissions')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('accueil_orientation');
    }
}
