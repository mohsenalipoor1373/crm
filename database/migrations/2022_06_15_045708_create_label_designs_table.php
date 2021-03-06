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
        Schema::create('label_designs', function (Blueprint $table) {

            $table->id()->index();
            $table->string('code');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('label_type_id');
            $table->string('name');
            $table->text('text')->nullable();
            $table->integer('status')->default('1');
            $table->timestamps();

            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('label_type_id')
                ->references('id')
                ->on('label_types')
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
        Schema::dropIfExists('label_designs');
    }
};
