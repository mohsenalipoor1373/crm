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
        Schema::create('setting_company', function (Blueprint $table) {
            $table->id()->index();
            $table->string('name');
            $table->string('tel_central_office');
            $table->string('fax_central_office');
            $table->string('office_email');
            $table->string('address_central_office');
            $table->string('factory_main_phone');
            $table->string('factory_fox');
            $table->string('factory_email');
            $table->string('factory_address');
            $table->string('home_logo');
            $table->string('logo_reports');
            $table->string('other_office_phone');
            $table->string('other_factory_phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting_company');
    }
};
