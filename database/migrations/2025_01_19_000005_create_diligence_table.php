<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiligenceTable extends Migration
{
    public function up()
    {
        Schema::create('diligence', function (Blueprint $table) {
            $table->bigIncrements('id_diligence');
            $table->unsignedBigInteger('id_soumission');

            $table->boolean('procedures_longues');
            $table->text('pourquoi_longues');
            $table->text('suggestions_delai');

            $table->boolean('formalites_complexes');
            $table->text('pourquoi_complexes');
            $table->text('suggestions_formalites');

            $table->timestamp('date_insertion')->useCurrent();

            $table->foreign('id_soumission')
                  ->references('id_soumission')
                  ->on('soumissions')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('diligence');
    }
}
