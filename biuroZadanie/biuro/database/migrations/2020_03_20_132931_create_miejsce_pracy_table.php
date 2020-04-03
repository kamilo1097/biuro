<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiejscePracyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miejsce_pracy', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('nazwa');
            $table->string('opis');

            $table->unsignedBigInteger('wyposazenie_id');

            $table->foreign('wyposazenie_id')->references('id')->on('wyposazenie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('miejsce_pracy');
    }
}
