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
            $table->timestamps();
        });

        Schema::create('service_heure', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('jour_id')->nullable();
            $table->unsignedInteger('service_id')->nullable();
            $table->unsignedInteger('heureouverture_id')->nullable();
            $table->unsignedInteger('heurefermeture_id')->nullable();
            $table->timestamps();
        });

        Schema::table('service_heure', function (Blueprint $table) {
            $table->foreign('heureouverture_id')->references('id')
                    ->on('heureouvertures')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });

        Schema::table('service_heure', function (Blueprint $table) {
            $table->foreign('heurefermeture_id')->references('id')
                    ->on('heurefermetures')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });

        Schema::table('service_heure', function (Blueprint $table) {
            $table->foreign('service_id')->references('id')
                    ->on('services')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });

        Schema::table('service_heure', function (Blueprint $table) {
            $table->foreign('jour_id')->references('id')
                    ->on('jours')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    public function down() {

        Schema::table('service_heure', function (Blueprint $table) {
            $table->dropForeign(['heureouverture_id']);
            $table->dropForeign(['heurefermeture_id']);
            $table->dropForeign(['jour_id']);
            $table->dropForeign(['service_id']);
        });
        Schema::dropIfExists('jours');
        Schema::dropIfExists('service_heure');
    }

}
