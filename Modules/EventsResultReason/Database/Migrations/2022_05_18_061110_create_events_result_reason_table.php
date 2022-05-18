<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_result_reason', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('events_subject_id');
            $table->unsignedBigInteger('events_result_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('events_subject_id')
                ->references('id')
                ->on('events_subject')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('events_result_id')
                ->references('id')
                ->on('events_result')
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
        Schema::dropIfExists('events_result_reason');
    }
};
