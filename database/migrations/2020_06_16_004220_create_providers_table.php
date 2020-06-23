<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProvidersTable extends Migration {

    public function up() {
        Schema::create('prestataires', function(Blueprint $table) {
            $table->increments('id');
            $table->string('ice')->nullable();
            $table->string('rc')->nullable();
            $table->string('i_f')->nullable();
            $table->string('nom_gerant')->nullable();
            $table->string('prenom_gerant')->nullable();
            $table->string('adresse_gerant')->nullable();
            $table->boolean('afficher')->nullable();
            $table->string('fax')->nullable();
            $table->string('comptebank')->nullable();
            $table->string('telephone')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });

        Schema::table('prestataires', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    public function down() {
        Schema::table('prestataires', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('prestataires');
    }

}
