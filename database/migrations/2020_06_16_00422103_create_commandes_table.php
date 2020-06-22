<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration {

    public function up() {
        Schema::create('commandes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('titre')->nullable();
            $table->string('description')->nullable();
            $table->string('code')->nullable();
            $table->boolean('reponse_client')->nullable();
            $table->text('reponse_prestataire')->nullable();
            $table->string('pdf_devis_prestataire')->nullable();
            $table->unsignedInteger('prestataire_id')->nullable();
            $table->unsignedInteger('service_id')->nullable();
            $table->unsignedInteger('client_id')->nullable();

            $table->timestamps();
        });

        Schema::table('commandes', function (Blueprint $table) {
            $table->foreign('service_id')->references('id')
                    ->on('services')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });

        Schema::table('commandes', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')
                    ->on('clients')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    public function down() {

        Schema::table('commandes', function (Blueprint $table) {
            $table->dropForeign(['service_id']);
            $table->dropForeign(['client_id']);
        });
        Schema::dropIfExists('commandes');
    }

}
