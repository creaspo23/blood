<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestigationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id');
            $table->string('unit')->nullable();
            $table->string('diagnosis')->nullable();
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
        Schema::dropIfExists('investigations');
    }
}
