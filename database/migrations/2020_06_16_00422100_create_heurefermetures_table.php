<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeureOuverturesTable extends Migration {

    public function up() {
        Schema::create('heureouvertures', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nom')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

    }

    public function down() {
         Schema::dropIfExists('heureouvertures');
    }

}
