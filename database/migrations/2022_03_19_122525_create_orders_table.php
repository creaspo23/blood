<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->references('id')->on('people');
            $table->string('unit');
            $table->string('diagnosis');
            $table->boolean('fresh')->default(0);
            $table->enum('hospital', ['السلاح الطبي', 'علياء']);
            $table->enum('type', ['اقتصادي', 'تامين']);
            $table->set('status', ['الانتظار', 'مكتمل', 'ملغي'])->default('الانتظار');
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
        Schema::dropIfExists('orders');
    }
}
