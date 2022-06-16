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
        Schema::create('events_result', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('events_subject_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('events_subject_id')
                ->references('id')
                ->on('events_subject')
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
        Schema::dropIfExists('events_results');
    }
};
