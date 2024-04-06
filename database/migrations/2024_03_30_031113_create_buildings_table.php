<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('landlord');
            $table->foreign('landlord')->references('id')->on('users'); 
            $table->longText('description');
            $table->longText('image_1');
            $table->longText('image_2')->nullable();
            $table->longText('image_3')->nullable();
            $table->longText('image_4')->nullable();
            $table->string('name')->unique();
            $table->integer('no_of_floors');
            $table->integer('room_per_floor');
            $table->string('address');
            $table->unsignedDecimal('deposit', 20, 2)->default(0);
            $table->longText('google_maps_link');
            $table->string('status')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buildings');
    }
};
