<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoursTable extends Migration {

    public function up() {
        Schema::create('jours', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nom')->nullable();
            $table->string('description')->nullable();
            $table->string('code')->nullable();         
            $table->unsignedInteger('heureouverture_id')->nullable();
            $table->unsignedInteger('heurefermeture_id')->nullable();
            $table->timestamps();
        });

        Schema::table('jours', function (Blueprint $table) {
            $table->foreign('heureouverture_id')->references('id')
                    ->on('heureouvertures')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });

        Schema::table('jours', function (Blueprint $table) {
            $table->foreign('heurefermeture_id')->references('id')
                    ->on('heurefermetures')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    public function down() {

        Schema::table('jours', function (Blueprint $table) {
            $table->dropForeign(['heureouverture_id']);
            $table->dropForeign(['heurefermeture_id']);
        });
        Schema::dropIfExists('jours');
    }

}
