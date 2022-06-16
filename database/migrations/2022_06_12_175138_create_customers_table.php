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
        Schema::create('customers', function (Blueprint $table) {
            $table->id()->index();
            $table->bigInteger('code');
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('designer_id');
            $table->unsignedBigInteger('industrial_id');
            $table->unsignedBigInteger('state_city_id');
            $table->string('national_code');
            $table->string('economic_code')->nullable();
            $table->string('tel_central_office')->nullable();
            $table->string('tel_factory')->nullable();
            $table->string('fax_central_office')->nullable();
            $table->string('fax_factory')->nullable();
            $table->string('address_central_office')->nullable();
            $table->string('address_factory')->nullable();
            $table->string('other_tel_central_office')->nullable();
            $table->string('other_tel_factory')->nullable();
            $table->string('credit_limit')->nullable();
            $table->string('open_account_ceiling')->nullable();
            $table->string('maximum_allowed_order_check_mode')->nullable();
            $table->string('status')->default(1);
            $table->timestamps();


            $table->foreign('seller_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('designer_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('industrial_id')
                ->references('id')
                ->on('industrial')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('state_city_id')
                ->references('id')
                ->on('state_city')
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
        Schema::dropIfExists('customers');
    }
};
