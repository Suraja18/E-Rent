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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('email');
            $table->string('phone_number', 10);
            $table->longText('logo');
            $table->longText('google_map');
            $table->longText('linkedin');
            $table->longText('facebook');
            $table->longText('instagram');
            $table->longText('twitter');
            $table->longText('contact_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
