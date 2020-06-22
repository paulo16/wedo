<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePayementsTable extends Migration {

    public function up() {
        Schema::create('payements', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('code')->nullable();
            $table->string('barcodeimage')->nullable();
        });
    }

    public function down() {
        Schema::dropIfExists('payements');
    }

}
