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
        $table->id();
        $table->integer('payment_method')->nullable();
        $table->integer('user_id')->nullable();
        $table->float('amount')->nullable()->comment('Số tiền thanh toán');
        $table->string('note')->nullable()->comment('Nội dung thanh toán');
        $table->string('vpn_response_code', 255)->nullable()->comment('Mã phản hồi');
        $table->string('code_vnpay', 255)->nullable()->comment('Mã giao dịch vnpay');
        $table->string('code_bank', 255)->nullable()->comment('Mã ngân hàng');
        $table->dateTime('time')->nullable()->comment('Thời điểm giao dịch');
        $table->timestamps();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
