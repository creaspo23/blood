<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDerivativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('derivatives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blood_withdraw_id');
            $table->foreignId('employee_id');
            $table->string('bottle_number');
            $table->set('blood_type', ['الدم الاحمر', 'الدم الكامل', 'الصفائح', 'البلازما', 'الراسب المتجمد']);
            $table->date('expire_date');
            $table->boolean('exchanged')->default(0);
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
        Schema::dropIfExists('derivatives');
    }
}
