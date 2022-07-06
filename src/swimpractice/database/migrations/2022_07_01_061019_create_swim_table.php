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
        Schema::create('swims', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('distance');
            $table->integer('number');
            $table->integer('set');
            $table->datetime('time');
            $table->string('body')->nullable();
            $table->integer('user_id');
            $table->integer('delete_flg')->default(0);
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
