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
            $table->Bigfloat('tst_total_amount')->nullable()->comment('Số tiền thanh toán');
            $table->string('e_wallet_provider')->nullable()->comment('Thanh toán qua');
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
