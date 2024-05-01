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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->bigInteger('phone_number')->unsigned()->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->longText('image')->nullable();
            $table->string('address')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->integer('roles');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->enum('active_status', [0, 1])->default(0); // 0: InActive , 1 : Active
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
