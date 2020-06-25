<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVillesTable extends Migration {

    public function up() {
        Schema::create('villes', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('region')->nullable();
            $table->string('nom')->nullable();
        });
    }

    public function down() {
        Schema::drop('villes');
    }

}
