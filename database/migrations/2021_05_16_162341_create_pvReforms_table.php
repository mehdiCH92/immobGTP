<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePvReformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pvReforms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_i');
            $table->bigInteger('code_bar');
            $table->string('description');
            $table->date('date_reforme');
            $table->integer('vu');
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
        Schema::dropIfExists('pvReforms');
    }
}
