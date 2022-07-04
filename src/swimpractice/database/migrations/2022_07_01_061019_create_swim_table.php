<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swim', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('distance');
            $table->integer('number');
            $table->integer('set');
            $table->datetime('time');
            $table->string('body');
            $table->integer('practice_number');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('swim');
    }
}
