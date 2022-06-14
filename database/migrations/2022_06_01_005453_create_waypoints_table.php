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
            $table->unsignedBigInteger('user_id');
            $table->string('departure_date'); //Дата отправления
            $table->string('travel_time')->nullable(); //Время в пути
            $table->string('arrival_date')->nullable(); //Дата прибытия
            $table->string('weight'); //общий вес
            $table->string('size');
            $table->string('packages_qty')->nullable(); //Кол-во пакетов
            $table->unsignedBigInteger('departure_city_id'); //Город отправления
            $table->unsignedBigInteger('arrival_city_id'); //Город прибытия
            $table->string('distance')->nullable(); //Расстояние
            $table->string('passed')->nullable(); //Пройдено
            $table->unsignedBigInteger('type_id')->default(1);
            $table->unsignedBigInteger('workload')->default(0);
            $table->string('available_weight')->default(0); //доступный
            $table->string('available_size')->default(0);
            $table->string('number')->default('-');
            $table->string('car_number')->default('---');
            $table->unsignedBigInteger('car_status_id')->default(1);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('departure_city_id')->references('id')->on('cities');
            $table->foreign('arrival_city_id')->references('id')->on('cities');
            $table->foreign('car_status_id')->references('id')->on('statuses');
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
