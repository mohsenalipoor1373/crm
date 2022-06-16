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
        Schema::create('events_customers', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('events_type_id');
            $table->unsignedBigInteger('events_subject_id');
            $table->unsignedBigInteger('events_result_id');
            $table->unsignedBigInteger('events_result_reason_id');
            $table->unsignedBigInteger('negotiator_id');
            $table->string('date');
            $table->string('negotiator_name');
            $table->string('negotiator_phone');
            $table->string('negotiator_text');
            $table->string('order_number')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('events_type_id')
                ->references('id')
                ->on('events_type')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('events_subject_id')
                ->references('id')
                ->on('events_subject')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('events_result_id')
                ->references('id')
                ->on('events_result')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('events_result_reason_id')
                ->references('id')
                ->on('events_result_reason')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('negotiator_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');


        });

        Schema::create('events_customers_attach', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('events_customers_id');
            $table->string('file');
            $table->timestamps();

            $table->foreign('events_customers_id')
                ->references('id')
                ->on('events_customers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::create('events_customers_detail', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('events_customers_id');
            $table->text('text');
            $table->timestamps();

            $table->foreign('events_customers_id')
                ->references('id')
                ->on('events_customers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::create('events_customers_detail_attach', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('events_customers_detail_id');
            $table->string('file');
            $table->timestamps();

            $table->foreign('events_customers_detail_id')
                ->references('id')
                ->on('events_customers_detail')
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
        Schema::dropIfExists('events_customers');
        Schema::dropIfExists('events_customers_attach');
        Schema::dropIfExists('events_customers_detail');
        Schema::dropIfExists('events_customers_detail_attach');
    }
};
