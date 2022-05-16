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
        Schema::create('essentials_dealers', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('essentials_packing_id');
            $table->string('code');
            $table->string('representative_name');
            $table->string('company_name');
            $table->string('phone');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('essentials_packing_id')
                ->references('id')
                ->on('essentials_packing')
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
        Schema::dropIfExists('essentials_dealers');
    }
};
