<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestigationTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigation_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('investigation_id');
            $table->set('test', ['AB screening', 'AB identification', 'AB titration']);
            $table->string('result')->nullable();
            $table->string('mean')->nullable();
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
        Schema::dropIfExists('investigation_tests');
    }
}
