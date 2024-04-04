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
            $table->string('rent_name')->nullable();
            $table->unsignedBigInteger('property_type_id');
            $table->unsignedBigInteger('landlord_id');
            $table->unsignedBigInteger('building_id');
            $table->unsignedBigInteger('floor')->default(0);
            $table->unsignedBigInteger('area');
            $table->unsignedBigInteger('no_of_bed')->default(0);
            $table->enum('type',['Sell','Rent'])->default('Rent');
            $table->unsignedDecimal('price', 20, 2);
            $table->unsignedDecimal('monthly_house_rent')->default(0);
            $table->longText('image_1')->nullable();
            $table->longText('image_2')->nullable();
            $table->longText('image_3')->nullable();
            $table->longText('image_4')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedDecimal('electric_charge', 20, 2)->default(0);
            $table->unsignedDecimal('water_charge', 20, 2)->default(0);
            $table->unsignedDecimal('garbage_charge', 20, 2)->default(0);
            $table->enum('status', ['Yes', 'No'])->default('No');
            $table->string('slug')->nullable();
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
