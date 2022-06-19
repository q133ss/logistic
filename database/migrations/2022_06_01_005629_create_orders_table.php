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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('waypoint_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->unsignedBigInteger('visible')->default(1);
            $table->foreign('waypoint_id')->references('id')->on('waypoints'); //компании привязанные к юзеру
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('orders');
    }
};
