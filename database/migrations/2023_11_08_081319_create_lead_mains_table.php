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
        Schema::create('lead_mains', function (Blueprint $table) {
            $table->id();
            $table->string('lead_name')->nullable(); // ประเภทคำสั่งซื้อ
            $table->integer('user_id')->default('0'); // user id
            $table->integer('pip_id')->default('0'); // pipeline id
            $table->integer('lead_lists_channels')->default('0'); //ช่องทางการขาย
            $table->integer('upsale_id')->default('0'); // id พนักงานอัพเซล
            $table->string('end_date')->nullable(); // วันที่หมดอายุ
            $table->text('note')->nullable(); // โน๊ต
            $table->integer('lead_mains_status')->default('0');
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
        Schema::dropIfExists('lead_mains');
    }
};
