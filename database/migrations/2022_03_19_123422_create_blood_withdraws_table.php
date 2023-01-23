<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_withdraws', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id');
            $table->nullableMorphs('processable');
            $table->string('bottle_number');
            $table->integer('time');
            $table->enum('status', ['صالحة', 'فاسدة'])->default('صالحة');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('blood_withdraws');
    }
}
