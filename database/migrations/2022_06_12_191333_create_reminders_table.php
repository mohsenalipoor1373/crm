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
        Schema::create('reminders', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('customer_id');
            $table->string('title');
            $table->text('text')->nullable();
            $table->string('date_in')->nullable();
            $table->string('time_in')->nullable();
            $table->string('date_to')->nullable();
            $table->string('time_to')->nullable();
            $table->string('repeat')->nullable();
            $table->integer('latest_show')->nullable();
            $table->string('show_time_day')->nullable();
            $table->string('show_day')->nullable();
            $table->integer('daily_reminder')->nullable();
            $table->integer('hourly_reminder')->nullable();
            $table->string('link')->nullable();
            $table->integer('displayed')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
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
        Schema::dropIfExists('reminders');
    }
};
