<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSortiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sorties', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('numero_commition');
            $table->string('nom_commition');
            $table->bigInteger('nombre_de_commition');
            $table->string('seance');
            $table->string('unite');
            $table->bigInteger('num_dossier');
            $table->string('type_sortie');
            $table->text('description');
            $table->string('desition');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sorties');
    }
}
