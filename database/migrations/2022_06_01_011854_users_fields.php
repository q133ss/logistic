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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->default(1);
            $table->unsignedBigInteger('confirm')->default(3);
            $table->string('company')->nullable();
            $table->string('contact_face')->nullable();
            $table->string('phone')->nullable();
            $table->string('bin')->nullable();
            $table->string('year')->nullable(); //с какого года работаете
            $table->string('requisites')->nullable();
            $table->string('tenge_account')->nullable();
            $table->string('usd_account')->nullable();
            $table->string('device_name')->default('web');
            $table->string('bearer_token')->nullable();
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
