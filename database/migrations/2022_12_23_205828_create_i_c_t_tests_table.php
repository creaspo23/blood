<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateICTTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_c_t_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kid_id')->references('id')->on('kid');
            $table->foreignId('employee_id');
            $table->enum('result',['نعم','لا']);
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
        Schema::dropIfExists('i_c_t_tests');
    }
}
