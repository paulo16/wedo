<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePayementsTable extends Migration
{

    public function up()
    {
        Schema::create('paiements', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('paiement_id')->nullable();
            $table->float('montant')->nullable();
            $table->string('code')->nullable();
            $table->string('barcodeimage')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
        });

        Schema::table('paiements', function (Blueprint $table) {

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {

        Schema::table('paiements', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('paiements');
    }
}
