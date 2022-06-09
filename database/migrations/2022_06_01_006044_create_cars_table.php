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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_id')->default(1);
            $table->unsignedBigInteger('workload')->default(0);
            $table->unsignedBigInteger('waypoint_id');
            $table->integer('available_weight')->default(0);
            $table->integer('available_size')->default(0);
            $table->string('number')->default('-');
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('waypoint_id')->references('id')->on('waypoints');
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
        Schema::dropIfExists('cars');
    }
};
