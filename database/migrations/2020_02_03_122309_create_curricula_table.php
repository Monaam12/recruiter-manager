<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculaTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('curricula', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')
                  ->on('users')->onDelete('cascade');
            //$table->string('first_name');
            //$table->string('last_name');
            $table->string('job')->nullable();
            $table->integer('age')->nullable();
            $table->string('address');
            $table->integer('phone');
            $table->string('image')->default('default.png');
            //$table->string('driving')->nullable();
            $table->text('about')->nullable();
            //$table->string('cv')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('curricula');
    }
}
