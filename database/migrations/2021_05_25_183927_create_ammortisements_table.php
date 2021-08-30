<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmmortisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ammortisements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_i');
            $table->date('date_operation');
            $table->integer('annee');
            $table->float('montant');
            $table->float('vnc');
            $table->float('rest_amortir');
            $table->string('observation');
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
        Schema::dropIfExists('ammortisements');
    }
}
