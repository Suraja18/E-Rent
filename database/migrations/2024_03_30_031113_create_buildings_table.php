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
            $table->longText('image-1');
            $table->longText('image-2');
            $table->longText('image-3');
            $table->longText('image-4');
            $table->string('name');
            $table->integer('no-of-floors');
            $table->string('address');
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
