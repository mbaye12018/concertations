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
            $table->json('types_corruption')->nullable();     // Stocké sous forme JSON ✅
            $table->text('autres_corruption')->nullable();
            $table->text('suggestions_integrite');

            $table->timestamps(); // ✅ Ajout des colonnes `created_at` et `updated_at`

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
