<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoutServiceTable extends Migration
{
    public function up()
    {
        Schema::create('cout_service', function (Blueprint $table) {
            $table->bigIncrements('id_cout');
            $table->unsignedBigInteger('id_soumission');

            $table->string('evaluation_cout', 50);    // "tres_abordable", ...
            $table->boolean('cout_justifie');         // 1=Oui, 0=Non
            $table->string('mecanisme_paiement', 50); // "Espèce", "e-money", ...
            $table->text('suggestions_cout');

            $table->timestamp('date_insertion')->useCurrent();

            $table->foreign('id_soumission')
                  ->references('id_soumission')
                  ->on('soumissions')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cout_service');
    }
}
