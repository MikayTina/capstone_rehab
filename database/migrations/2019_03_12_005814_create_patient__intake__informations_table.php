<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientIntakeInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient__intake__informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->integer('emergency_id')->unsigned();
            $table->foreign('emergency_id')->references('id')->on('emergency__persons');
            $table->string('educational_attainment');
            $table->string('employment_status');
            $table->string('spouse');
            $table->string('father');
            $table->string('mother');
            $table->text('presenting_problems');
            $table->text('impression');
            $table->string('date');
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
        Schema::dropIfExists('patient__intake__informations');
    }
}
