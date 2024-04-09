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
        Schema::create('rent_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rented_id');
            $table->unsignedDecimal('amt_paid', 20, 2);
            $table->enum('status', ['Paid', 'Half-Paid', 'Unpaid']);
            $table->enum('payment_mode', ['Bank', 'Cash', 'Cheque', 'Online'])->default('Online');
            $table->enum('payment_type', ['Deposit', 'Rent', 'Sell']);
            $table->enum('visible', ['Yes','No'])->default('Yes');
            $table->enum('tenantVisible', ['Yes','No'])->default('Yes');
            $table->string('month', 7)->nullable()->comment('Format: YYYY-MM');
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('rented_id')->references('id')->on('rented_properties')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_payments');
    }
};
