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
        Schema::create('case_descriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('case_id');
            $table->longText('icon');
            $table->string('heading');
            $table->string('description');
            $table->timestamps();
            $table->foreign('case_id')->references('id')->on('use_cases')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_descriptions');
    }
};
