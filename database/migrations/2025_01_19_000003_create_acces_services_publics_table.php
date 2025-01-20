<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccesServicesPublicsTable extends Migration
{
    public function up()
{
    Schema::create('acces_services_publics', function (Blueprint $table) {
        $table->bigIncrements('id_acces');
        $table->unsignedBigInteger('id_soumission');

        $table->text('services_frequentes');
        $table->string('accessibilite', 50);
        $table->text('pourquoi_accessibilite');
        $table->text('suggestions_acces');
        $table->text('mode_information');

        $table->timestamps(); // Ajoute created_at et updated_at
        $table->timestamp('date_insertion')->useCurrent();

        $table->foreign('id_soumission')
              ->references('id_soumission')
              ->on('soumissions')
              ->onDelete('cascade');
    });
}


    public function down()
    {
        Schema::dropIfExists('acces_services_publics');
    }
}
