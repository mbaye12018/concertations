<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclamationsTable extends Migration
{
    public function up()
    {
        Schema::create('reclamations', function (Blueprint $table) {
            $table->bigIncrements('id_reclamation');
            $table->unsignedBigInteger('id_soumission');

            $table->boolean('deja_deposee');
            $table->text('service_concerne')->nullable();     // ex: "papiersAdmin,transport"
            $table->string('mode_reclamation', 50)->nullable();
            $table->string('processus_clair', 50)->nullable();
            $table->string('delai_traitement', 50)->nullable();
            $table->text('commentaires_reclamation')->nullable();

            $table->timestamp('date_insertion')->useCurrent();

            $table->foreign('id_soumission')
                  ->references('id_soumission')
                  ->on('soumissions')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reclamations');
    }
}
