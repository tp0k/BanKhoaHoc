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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('payment_method')->nullable();
            $table->integer('tst_user_id')->nullable();
            $table->decimal('tst_total_amount', 8, 2)->nullable()->comment('Số tiền thanh toán');
            $table->string('e_wallet_provider')->nullable()->comment('Thanh toán qua');
            $table->string('tst_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
