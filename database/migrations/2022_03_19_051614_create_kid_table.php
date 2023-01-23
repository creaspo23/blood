<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kid', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mother_id')->references('id')->on('people');
            $table->foreignId('kid_id')->references('id')->on('people');
            $table->enum('type', ['اقتصادي', 'تامين']);
            $table->set('status', ['الانتظار', 'مكتمل', 'ملغتي'])->default('الانتظار');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kid');
    }
}
