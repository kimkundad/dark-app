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
        Schema::create('follow_pipes', function (Blueprint $table) {
            $table->id();
            $table->integer('follow_pipes_status')->default('0');
            $table->integer('read_id')->default('0');
            $table->integer('upsale_idx')->default('0');
            $table->integer('sub_pipe_id')->default('0');
            $table->integer('user_id_add')->default('0');
            $table->integer('cus_id')->default('0');
            $table->integer('night_set')->default('0');
            $table->string('date_follow')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('follow_pipes');
    }
};
