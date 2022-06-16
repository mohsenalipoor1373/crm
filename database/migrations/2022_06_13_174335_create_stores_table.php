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
        Schema::create('stores', function (Blueprint $table) {
            $table->id()->index();
            $table->string('code')->nullable();
            $table->unsignedBigInteger('stores_type_id');
            $table->string('prefix');
            $table->string('location');
            $table->string('capacity_number')->nullable();
            $table->string('capacity_weight')->nullable();
            $table->timestamps();
            $table->foreign('stores_type_id')
                ->references('id')
                ->on('stores_types')
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
        Schema::dropIfExists('stores');
    }
};
