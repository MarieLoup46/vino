<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsBouteillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_bouteilles', function (Blueprint $table) {
            $table->id();
            $table->text('infos_detaillees');
            $table->string('pays', 100);
            $table->string('region', 100);
            $table->string('designation_reglementee', 200);
            $table->string('cepages', 200);
            $table->string('degre_alcool', 50);
            $table->string('taux_sucre', 50);
            $table->string('couleur', 50);
            $table->string('particularite', 200);
            $table->string('format', 50);
            $table->string('producteur', 200);
            $table->string('agent_promotionnel', 200);
            $table->string('code_saq', 50);
            $table->unsignedBigInteger('bouteille_id');
            $table->foreign('bouteille_id')->references('id')->on('bouteilles');
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
        Schema::dropIfExists('details_bouteilles');
    }
}
