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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('pro_name')->nullable();
            $table->string('pro_code')->nullable();
            $table->string('bar_code')->nullable();
            $table->string('pro_img')->nullable();
            $table->double('price', 8, 2)->default('0.00');
            $table->double('cost', 8, 2)->default('0.00');
            $table->integer('tax')->default('0');
            $table->integer('type_product')->default('0');
            $table->string('detail')->nullable();
            $table->integer('total')->default('0');
            $table->integer('cat_id')->default('0');
            $table->double('weight', 8, 2)->default('0.00');
            $table->double('width', 8, 2)->default('0.00');
            $table->double('height', 8, 2)->default('0.00');
            $table->double('pro_length', 8, 2)->default('0.00');
            $table->integer('user_create')->default('0');
            $table->integer('status')->default('0');
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
        Schema::dropIfExists('products');
    }
};
