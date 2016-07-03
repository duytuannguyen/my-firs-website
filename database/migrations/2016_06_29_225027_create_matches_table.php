<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');

            $table->string('home_team');
            $table->string('visitor_team');
            $table->float('home_win');
            $table->float('visitor_win');
            $table->float('zero_zero');
            $table->dateTimeTz('time_begin');
            $table->dateTimeTz('time_end');
            $table->integer('home_score');
            $table->integer('visitor_score');
            $table->enum('role',['private','public'])->default('private');
            $table->enum('process',['check','checked'])->default('check');
            
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
        Schema::drop('matches');
    }
}
