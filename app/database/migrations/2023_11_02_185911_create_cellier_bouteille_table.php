<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCellierBouteilleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cellier_bouteille', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cellier_id');
            $table->unsignedBigInteger('bouteille_id');
            $table->integer('quantite');
            $table->timestamps();

            $table->foreign('cellier_id')->references('id')->on('celliers');
            $table->foreign('bouteille_id')->references('id')->on('bouteilles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cellier_bouteille');
    }
}
