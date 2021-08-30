<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImobphsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imobphs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_comp_c');
            $table->string('desingnation');
            $table->string('derection');
            $table->string('service');
            $table->string('localisation');
            $table->bigInteger('code_bar');
            $table->date('date_acc');
            $table->date('date_sortie');
            $table->bigInteger('num_inv');
            $table->bigInteger('num_pv_rec');
            $table->bigInteger('num_pv_cod');
            $table->bigInteger('num_serie');
            $table->bigInteger('num_mat');
            $table->integer('prop_reforme');
            $table->string('code_comptable');
            $table->string('type_actif');
            $table->float('prix_acci');
            $table->float('taux_am');
            $table->float('TVA');
            $table->float('TTC');
            $table->float('HOR_TAX');
            $table->string('situation');
            $table->string('marque');
            $table->string('fourniseur');
            $table->string('etat');
            $table->text('descEtat');
            $table->float('vnc');
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
        Schema::dropIfExists('imobphs');
    }
}
