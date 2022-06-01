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
        Schema::create('waypoints', function (Blueprint $table) {
            $table->id();
            $table->string('departure_date'); //Дата отправления
            $table->string('travel_time'); //Время в пути
            $table->string('arrival_date'); //Дата прибытия
            $table->string('weight');
            $table->string('size');
            $table->string('packages_qty'); //Кол-во пакетов
            $table->unsignedBigInteger('departure_city_id'); //Город отправления
            $table->unsignedBigInteger('arrival_city_id'); //Город прибытия
            $table->string('distance'); //Расстояние
            $table->string('passed'); //Пройдено
            $table->foreign('departure_city_id')->references('id')->on('cities');
            $table->foreign('arrival_city_id')->references('id')->on('cities');
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
        Schema::dropIfExists('waypoints');
    }
};
