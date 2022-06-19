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
        Schema::create('label_design_versions', function (Blueprint $table) {
            $table->id()->index();
            $table->string('code');
            $table->unsignedBigInteger('label_design_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('designer_id');
            $table->string('shape');
            $table->string('size');
            $table->string('direction')->nullable();
            $table->string('name_file')->nullable();
            $table->string('file');
            $table->text('text')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();

            $table->foreign('label_design_id')
                ->references('id')
                ->on('label_designs')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('designer_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('label_design_versions');
    }
};
