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
        Schema::create('product_packing', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('essentials_packing_id');
            $table->string('number_products_package');
            $table->string('number_cartons_package');
            $table->string('number_packages_pallet');
            $table->string('final_packaging')->default(null);
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('product_packings');
    }
};
