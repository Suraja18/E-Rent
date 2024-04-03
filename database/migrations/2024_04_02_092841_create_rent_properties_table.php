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
        Schema::create('rent_properties', function (Blueprint $table) {
            $table->id();
            $table->string('rent_name');
            $table->unsignedBigInteger('property_type_id');
            $table->unsignedBigInteger('landlord_id');
            $table->unsignedBigInteger('building_id');
            $table->unsignedBigInteger('floor');
            $table->unsignedBigInteger('area');
            $table->unsignedBigInteger('no_of_bed');
            $table->unsignedDecimal('monthly_house_rent');
            $table->longText('image_1');
            $table->longText('image_2')->nullable();
            $table->longText('image_3')->nullable();
            $table->longText('image_4')->nullable();
            $table->longText('description');
            $table->unsignedDecimal('electric_charge', 20, 2)->default(0);
            $table->unsignedDecimal('water_charge', 20, 2)->default(0);
            $table->unsignedDecimal('garbage_charge', 20, 2)->default(0);
            $table->enum('status', ['Yes', 'No'])->default('No');
            $table->string('slug');
            $table->foreign('property_type_id')->references('id')->on('units')->onDelete('cascade');
            $table->foreign('landlord_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('building_id')->references('id')->on('buildings')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_properties');
    }
};
