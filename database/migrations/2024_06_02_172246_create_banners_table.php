<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title_banner')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('events_id');
            // ->index()
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('events_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('banners');
    }
};
