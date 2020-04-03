<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOsobaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('osoby', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('imie');
            $table->string('nazwisko');
            $table->string('telefon');
            $table->string('email');
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
        Schema::dropIfExists('osoba');
    }
}
