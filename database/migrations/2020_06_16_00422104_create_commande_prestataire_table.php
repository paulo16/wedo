<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandePrestataireTable extends Migration {

    public function up() {
        Schema::create('commande_prestataire', function(Blueprint $table) {
            $table->increments('id');
            $table->boolean('reponse_client')->nullable();
            $table->text('reponse_prestataire')->nullable();
            $table->string('pdf_devis_prestataire')->nullable();
            $table->string('pdf_paiement_client')->nullable();
            $table->unsignedInteger('prestataire_id')->nullable();
            $table->unsignedInteger('commande_id')->nullable();

            $table->timestamps();
        });

        Schema::table('commande_prestataire', function (Blueprint $table) {
            $table->foreign('commande_id')->references('id')
                    ->on('commandes')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });

        Schema::table('commande_prestataire', function (Blueprint $table) {
            $table->foreign('prestataire_id')->references('id')
                    ->on('prestataires')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    public function down() {

        Schema::table('commande_prestataire', function (Blueprint $table) {
            $table->dropForeign(['commande_id']);
            $table->dropForeign(['prestataire_id']);
        });
        Schema::dropIfExists('commande_prestataire');
    }

}
