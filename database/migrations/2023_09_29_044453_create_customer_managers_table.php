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
        Schema::create('customer_managers', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable();
            $table->string('codeuser')->nullable();
            $table->string('nickname')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->string('sex')->nullable();
            $table->string('hbd')->nullable();
            $table->string('email')->nullable();
            $table->string('line')->nullable();
            $table->integer('mix_address')->default('0');
            $table->string('type_address')->nullable();
            $table->text('address')->nullable();
            $table->string('Subdistrict')->nullable();
            $table->string('county')->nullable();
            $table->string('province')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('district')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('channels')->default('0');
            $table->integer('status')->default('0');
            $table->integer('lock_avatar')->default('0');
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
        Schema::dropIfExists('customer_managers');
    }
};
