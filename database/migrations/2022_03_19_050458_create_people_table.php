<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('birth_date');
            $table->enum('gender', ['ذكر', 'انثى']);
            $table->set('blood_group', ['A+', 'B+', 'AB+', 'O+', 'A-', 'B-', 'AB-', 'O-'])->nullable();
            $table->string('genotype')->nullable();
            $table->text('address')->nullable();
            $table->text('job_title')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('blocked')->default(0);
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
        Schema::dropIfExists('people');
    }
}
