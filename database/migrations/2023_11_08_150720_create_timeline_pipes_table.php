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
        Schema::create('timeline_pipes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default('0'); // user id
            $table->integer('lead_main_id')->default('0');
            $table->integer('sub_pipe_id')->default('0');
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
        Schema::dropIfExists('timeline_pipes');
    }
};
