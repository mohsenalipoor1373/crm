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
        Schema::create('essentials_packing', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('essentials_packing_type_id');
            $table->string('code');
            $table->string('name');
            $table->string('size');
            $table->timestamps();

            $table->foreign('essentials_packing_type_id')
                ->references('id')
                ->on('essentials_packing_type')
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
        Schema::dropIfExists('essentials_packing');
    }
};
