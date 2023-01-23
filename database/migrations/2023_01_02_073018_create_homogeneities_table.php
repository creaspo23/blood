<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomogeneitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homogeneities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->references('id')->on('people');
            $table->foreignId('order_id');
            $table->foreignId('employee_id');
            $table->foreignId('dontion_id');
            $table->enum('status', ['نجاح', 'فشل']);
            $table->json('bottels')->nullable();
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
        Schema::dropIfExists('homogeneities');
    }
}
