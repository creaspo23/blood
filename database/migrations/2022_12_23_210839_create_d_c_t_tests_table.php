<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDCTTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_c_t_tests', function (Blueprint $table) {
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
        Schema::dropIfExists('d_c_t_tests');
    }
}
