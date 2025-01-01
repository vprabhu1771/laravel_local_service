<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\PaymentStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_transactions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('customer_id')->nullable();

            $table->unsignedBigInteger('provider_id')->nullable();

            $table->unsignedBigInteger('service_id')->nullable();

            $table->decimal('amount', 8, 2);

            $table->dateTime('transaction_date');

            $table->string('payment_status')->default(PaymentStatus::Paid)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_transactions');
    }
};
