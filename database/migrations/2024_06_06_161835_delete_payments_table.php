<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     *  @return void
     */
    public function up(): void
    {
        Schema::dropIfExists('payments');
    }

    /**
     *  @return void
     */
    public function down(): void
    {
        //
    }
};