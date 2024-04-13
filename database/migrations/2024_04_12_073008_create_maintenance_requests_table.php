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
        Schema::create('maintenance_requests', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->unsignedBigInteger('rented_id');
            $table->date('date');
            $table->time('time1');
            $table->time('time2')->nullable();
            $table->longText('image');
            $table->longText('video');
            $table->enum('piority', ['Low', 'Normal', 'High', 'Critical']);
            $table->enum('status', ['New', 'In Progress', 'Cancelled', 'Completed'])->default('New');
            $table->enum('tenantVisible', ['Yes', 'No'])->default('Yes');
            $table->enum('landlordVisible', ['Yes', 'No'])->default('Yes');
            $table->timestamps();
            $table->foreign('rented_id')->references('id')->on('rented_properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_requests');
    }
};
