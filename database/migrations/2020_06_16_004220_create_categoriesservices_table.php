<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesservicesTable extends Migration {

    public function up() {
        Schema::create('categoriesservices', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nom')->nullable();
            $table->boolean('afficher')->nullable();
            $table->string('description')->nullable();
            $table->string('photo')->nullable();
            $table->string('code')->nullable();
        });

    }

    public function down() {
         Schema::dropIfExists('categoriesservices');
    }

}
