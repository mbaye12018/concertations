<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorruptionTable extends Migration
{
    public function up()
    {
        Schema::create('corruption', function (Blueprint $table) {
            $table->bigIncrements('id_corruption');
            $table->unsignedBigInteger('id_soumission');

            $table->boolean('corruption_existante');     // 1=Oui, 0=Non
            $table->string('niveau_gravite', 50)->nullable(); // "tres_grave", ...
            $table->text('types_corruption')->nullable();     // ex: "Pots-de-vin,autres"
            $table->text('autres_corruption')->nullable();
            $table->text('suggestions_integrite');

            $table->timestamp('date_insertion')->useCurrent();

            $table->foreign('id_soumission')
                  ->references('id_soumission')
                  ->on('soumissions')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('corruption');
    }
}
