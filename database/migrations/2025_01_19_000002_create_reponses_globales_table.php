<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReponsesGlobalesTable extends Migration
{
    public function up()
    {
        Schema::create('reponses_globales', function (Blueprint $table) {
            // On référence directement l'id_soumission comme clé primaire
            $table->bigInteger('id_soumission')->unsigned()->primary();

            // JSON requiert MySQL 5.7+ ou MariaDB 10.2+. Sinon, remplacer par longText('contenu_json').
            $table->json('contenu_json');

            // Date mise à jour
            $table->timestamp('derniere_mise_a_jour')
                  ->useCurrent()
                  ->useCurrentOnUpdate();

            // Clé étrangère
            $table->foreign('id_soumission')
                  ->references('id_soumission')
                  ->on('soumissions')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reponses_globales');
    }
}
