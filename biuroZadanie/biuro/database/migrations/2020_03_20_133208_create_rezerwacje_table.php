<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRezerwacjeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rezerwacje', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->dateTime('kiedy_rezerwacja_od');
            $table->dateTime('kiedy_rezerwacja_do');
            $table->unsignedBigInteger('osoba_id');
            $table->unsignedBigInteger('miejsce_pracy_id');


            $table->foreign('osoba_id')->references('id')->on('osoby');
            $table->foreign('miejsce_pracy_id')->references('id')->on('miejsce_pracy');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rezerwacje');
    }
}
