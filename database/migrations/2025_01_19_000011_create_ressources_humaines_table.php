<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRessourcesHumainesTable extends Migration
{
    public function up()
    {
        Schema::create('ressources_humaines', function (Blueprint $table) {
            $table->bigIncrements('id_rh');
            $table->unsignedBigInteger('id_soumission');

            $table->text('avis_relations');
            $table->text('pourquoi_relations');

            $table->timestamp('date_insertion')->useCurrent();

            $table->foreign('id_soumission')
                  ->references('id_soumission')
                  ->on('soumissions')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ressources_humaines');
    }
}
