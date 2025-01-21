<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDigitaleTable extends Migration
{
    public function up()
    {
        Schema::create('digitale', function (Blueprint $table) {
            $table->bigIncrements('id_digitale');
            $table->unsignedBigInteger('id_soumission');

            $table->boolean('utilise_services_digitaux');      // 1=Oui, 0=Non
            $table->text('services_digitaux_frequents')->nullable();
            $table->string('autres_services_digitaux', 255)->nullable();

            $table->string('evaluation_accessibilite', 50);
            $table->boolean('rencontree_problemes');           // 1=Oui, 0=Non
            $table->text('types_problemes')->nullable();       // ex: "connexionIssue,techniqueIssue"
            $table->string('autres_problemes', 255)->nullable();
            $table->text('suggestions_digitale');

            $table->timestamps(); // ✅ Ajoute `created_at` et `updated_at`

            $table->foreign('id_soumission')
                  ->references('id_soumission')
                  ->on('soumissions')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('digitale');
    }
}
