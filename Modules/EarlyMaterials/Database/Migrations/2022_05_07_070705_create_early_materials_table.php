<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('early_materials', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('material_id');
            $table->unsignedBigInteger('grade_id');
            $table->unsignedBigInteger('petrochemical_id');
            $table->unsignedBigInteger('quality_materials_id');
            $table->string('name');
            $table->string('current_price');
            $table->string('previous_price');
            $table->string('status');
            $table->timestamps();

            $table->foreign('material_id')
                ->references('id')
                ->on('materials')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('grade_id')
                ->references('id')
                ->on('grades')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('petrochemical_id')
                ->references('id')
                ->on('petrochemicals')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('quality_materials_id')
                ->references('id')
                ->on('quality_materials')
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
        Schema::dropIfExists('early_materials');
    }
};
