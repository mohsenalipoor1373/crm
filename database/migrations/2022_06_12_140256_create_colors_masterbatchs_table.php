<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colors_masterbatchs', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('masterbatch_id');
            $table->string('price');
            $table->string('mixing_percentage');
            $table->string('date');
            $table->integer('status');
            $table->timestamps();
            $table->foreign('color_id')
                ->references('id')
                ->on('colors')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('masterbatch_id')
                ->references('id')
                ->on('masterbachs')
                ->onDelete('cascade')
                ->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('color_masterbatches');
    }
};
