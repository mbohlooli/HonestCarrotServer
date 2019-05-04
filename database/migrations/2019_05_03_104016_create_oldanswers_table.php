<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOldanswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oldanswers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->unsigned()->nullable()->index();
            $table->integer('qid')->unsigned()->nullable()->index();
            $table->boolean('aid');
            $table->boolean('correct');
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
        Schema::dropIfExists('oldanswers');
    }
}
