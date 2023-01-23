<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolycythemiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polycythemias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id');
            $table->enum('type', ['اقتصادي', 'تامين']);
            $table->integer('HB')->nullable();
            $table->string('HCT')->nullable();
            $table->string('WBCs')->nullable();
            $table->string('platelets')->nullable();
            $table->set('BP', ['منخفض', 'طبيعي', 'عالي'])->nullable();
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
        Schema::dropIfExists('polycythemias');
    }
}
