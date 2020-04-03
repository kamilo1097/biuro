<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWyposazenieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wyposazenie', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('rodzaj');
            $table->string('model');
            $table->string('nazwa');
            $table->date('rok_zakupu');
            $table->integer('wartosc');
            $table->string('opis');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wyposazenie');
    }
}
