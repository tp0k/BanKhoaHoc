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
        Schema::create('vpayment', function (Blueprint $table) {
            $table->id();
            $table->integer('transaction_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->decimal('amount', 8, 2)->nullable()->comment('Số tiền thanh toán');
            $table->string('note')->nullable()->comment('Nội dung thanh toán');
            $table->string('vnp_response_code')->nullable()->comment('Mã phản hồi');; // Thêm cột 'vnp_response_code'
            $table->string('code_vnpay', 255)->nullable()->comment('Mã giao dịch vnpay');
            $table->string('code_bank', 255)->nullable()->comment('Mã ngân hàng');
            $table->dateTime('time')->nullable()->comment('Thời điểm giao dịch');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vpayment');
    }
};
