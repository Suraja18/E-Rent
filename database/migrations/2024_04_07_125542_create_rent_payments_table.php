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
            $table->unsignedDecimal('monthly_payment', 20, 2);
            $table->unsignedDecimal('amt_paid', 20, 2);
            $table->enum('status', ['Paid', 'Half-Paid', 'Unpaid']);
            $table->enum('payment_mode', ['Bank', 'Cash', 'Cheque', 'Remaining'])->default('Remaining');
            $table->enum('payment_type', ['Deposit', 'Rent', 'Sell', 'Due']);
            $table->date('Month')->nullable();
            $table->timestamps();
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
