<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReponsesGlobalesTable extends Migration
{
    public function up()
    {
        Schema::create('reponses_globales', function (Blueprint $table) {
            // `id_soumission` doit être AUTO_INCREMENT et clé primaire
            $table->bigIncrements('id_soumission');

            // Changer json en longText si MySQL < 5.7
            $table->json('contenu_json');

            // Date mise à jour automatique
            $table->timestamp('derniere_mise_a_jour')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reponses_globales');
    }
}
