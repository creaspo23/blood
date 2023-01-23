<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderBloodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_bloods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->set('blood_type', ['الدم الاحمر', 'الدم الكامل', 'الصفائح', 'البلازما', 'الراسب المتجمد']);
            $table->integer('quantity');
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
        Schema::dropIfExists('order_bloods');
    }
}
