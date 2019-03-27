<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient__histories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date');
            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->integer('by')->unsigned();
            $table->foreign('by')->references('id')->on('users');
            $table->string('type');
            $table->integer('from_dep')->unsigned()->nullable();
            $table->foreign('from_dep')->references('id')->on('departments');
            $table->integer('to_dep')->unsigned()->nullable();
            $table->foreign('to_dep')->references('id')->on('departments');
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('patient__histories');
    }
}
