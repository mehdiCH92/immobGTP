<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBprosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bpros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_i');
            $table->date('date_operation');
            $table->date('date_d');
            $table->date('date_f');
            $table->integer('annee');
            $table->float('montant');
            $table->float('vnc');
            $table->float('prix_acci');
            $table->string('observation');
            $table->string('num_comp_c');
            $table->string('desingnation');
            $table->string('code_bar');
            
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
        Schema::dropIfExists('bpros');
    }
}
