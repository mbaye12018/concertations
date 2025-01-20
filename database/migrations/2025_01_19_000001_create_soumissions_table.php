<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoumissionsTable extends Migration
{
    public function up()
    {
        Schema::create('soumissions', function (Blueprint $table) {
            $table->bigIncrements('id_soumission');
            $table->string('tranche_age', 50);
            $table->string('sexe', 10);
            $table->string('lieu_residence', 20);
            $table->unsignedBigInteger('region_id')->nullable();
            $table->unsignedBigInteger('departement_id')->nullable();
            $table->string('pays_diaspora', 50)->nullable();

            $table->timestamp('date_soumission')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('soumissions');
    }
}
