<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObroksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obroks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ime');
            $table->integer('lokal_id')->unsigned();
            $table->integer('cena');
            $table->mediumText('opis');
            $table->timestamps();
            $table->foreign('lokal_id')->references('id')->on('lokals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obroks');
    }
}
