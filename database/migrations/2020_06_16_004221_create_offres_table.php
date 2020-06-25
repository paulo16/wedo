<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffresTable extends Migration {

    public function up() {
        Schema::create('offres', function(Blueprint $table) {
            $table->increments('id');
            $table->string('titre')->nullable();
            $table->string('description')->nullable();
            $table->integer('prix')->nullable();
            $table->integer('reduction')->nullable();
            $table->boolean('afficher')->nullable();
            $table->string('code')->nullable();
            $table->unsignedInteger('service_id')->nullable();

            $table->timestamps();
        });

        Schema::table('offres', function (Blueprint $table) {
            $table->foreign('service_id')->references('id')
                    ->on('services')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    public function down() {

        Schema::table('offres', function (Blueprint $table) {
            $table->dropForeign(['service_id']);
        });
        Schema::dropIfExists('offres');
    }

}
