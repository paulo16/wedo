<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeureFermeturesTable extends Migration {

    public function up() {
        Schema::create('heurefermetures', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nom')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

    }

    public function down() {
         Schema::dropIfExists('heurefermetures');
    }

}
