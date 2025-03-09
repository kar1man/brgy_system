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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('role', ['resident', 'official']);
            $table->unsignedBigInteger('resident_id')->nullable();
            $table->unsignedBigInteger('official_id')->nullable();
            $table->foreign('resident_id')->references('id')->on('residents')->onDelete('cascade');
            $table->foreign('official_id')->references('id')->on('officials')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
};
