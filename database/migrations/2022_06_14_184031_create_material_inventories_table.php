<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_inventories', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('early_materials_id');
            $table->unsignedBigInteger('stores_id');
            $table->string('minimum_inventory');
            $table->string('maximum_inventory');
            $table->string('healthy_inventory');
            $table->string('transport_healthy_inventory');
            $table->string('quarantine_inventory');
            $table->string('temporary_inventory');
            $table->timestamps();

            $table->foreign('early_materials_id')
                ->references('id')
                ->on('early_materials')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('stores_id')
                ->references('id')
                ->on('stores')
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
        Schema::dropIfExists('material_inventories');
    }
};
