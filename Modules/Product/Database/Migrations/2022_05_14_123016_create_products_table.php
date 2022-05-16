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
        Schema::create('products', function (Blueprint $table) {
            $table->id()->index();
            $table->string('code');
            $table->string('name');
            $table->unsignedBigInteger('product_type_id');
            $table->unsignedBigInteger('product_shape_id');
            $table->unsignedBigInteger('product_index_id');
            $table->unsignedBigInteger('product_dim_id');
            $table->string('weight');
            $table->string('wage');
            $table->string('per_sale');
            $table->string('assembly');
            $table->string('production_capacity');
            $table->string('cycle_time');
            $table->string('quetta_number');
            $table->string('place_production');
            $table->string('isHandle');
            $table->integer('status');
            $table->timestamps();
            $table->foreign('product_type_id')
                ->references('id')
                ->on('products_type')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('product_shape_id')
                ->references('id')
                ->on('products_shape')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('product_index_id')
                ->references('id')
                ->on('products_index')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('product_dim_id')
                ->references('id')
                ->on('products_dim')
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
        Schema::dropIfExists('products');
    }
};
