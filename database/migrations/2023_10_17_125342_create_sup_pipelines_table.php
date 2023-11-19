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
        Schema::create('sup_pipelines', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('day')->nullable();
            $table->integer('sort')->default('0');
            $table->integer('pipe_id')->default('0');
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
        Schema::dropIfExists('sup_pipelines');
    }
};
