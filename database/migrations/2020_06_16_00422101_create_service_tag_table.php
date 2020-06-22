<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTagTable extends Migration {

    public function up() {
        Schema::create('service_tag', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('service_id')->nullable();
            $table->unsignedInteger('tag_id')->nullable();
            $table->timestamps();
        });

        Schema::table('service_tag', function (Blueprint $table) {
            $table->foreign('service_id')->references('id')
                    ->on('services')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });

        Schema::table('service_tag', function (Blueprint $table) {
            $table->foreign('tag_id')->references('id')
                    ->on('tags')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    public function down() {
        Schema::table('service_tag', function (Blueprint $table) {
            $table->dropForeign(['service_id']);
            $table->dropForeign(['tag_id']);
        });

        Schema::dropIfExists('service_tag');
    }

}
