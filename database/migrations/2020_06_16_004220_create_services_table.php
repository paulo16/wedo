<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration {

    public function up() {
        Schema::create('services', function(Blueprint $table) {
            $table->increments('id');
            $table->string('titre')->nullable();
            $table->string('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('code')->nullable();
            $table->boolean('afficher')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('google_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('tumbler_url')->nullable();
            $table->string('pinterest_url')->nullable();
            $table->string('vimeo_url')->nullable();
            $table->string('envato_url')->nullable();
            $table->string('video_url')->nullable();
            $table->unsignedInteger('categoriesservice_id')->nullable();
            $table->unsignedInteger('ville_id')->nullable();

            $table->timestamps();
        });

        Schema::table('services', function (Blueprint $table) {
            $table->foreign('categoriesservice_id')->references('id')
                    ->on('categoriesservices')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });

        Schema::table('services', function (Blueprint $table) {
            $table->foreign('ville_id')->references('id')
                    ->on('villes')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    public function down() {

        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign(['categoriesservice_id']);
            $table->dropForeign(['ville_id']);
        });
        Schema::dropIfExists('services');
    }

}
