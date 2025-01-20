<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipationTable extends Migration
{
    public function up()
    {
        Schema::create('participation', function (Blueprint $table) {
            $table->bigIncrements('id_participation');
            $table->unsignedBigInteger('id_soumission');

            $table->boolean('information_reformes');  // 1=Oui, 0=Non
            $table->string('satisfaction_participation', 50);
            $table->boolean('facilite_numerique');    // 1=Oui, 0=Non
            $table->boolean('impact_reel');           // 1=Oui, 0=Non

            $table->text('suggestions_inclusion');

            $table->timestamp('date_insertion')->useCurrent();

            $table->foreign('id_soumission')
                  ->references('id_soumission')
                  ->on('soumissions')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('participation');
    }
}
