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
        Schema::create('rented_properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tenant_id');
            $table->unsignedBigInteger('rent_id');
            $table->unsignedDecimal('discount', 20, 2)->default(0);
            $table->enum('status',['New', 'Approved', 'Cancelled', 'Checked Out']);
            $table->enum('active',['Yes', 'No']);
            $table->timestamps();
            $table->foreign('tenant_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('rent_id')->references('id')->on('rent_properties')->onDelete('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rented_properties');
    }
};
