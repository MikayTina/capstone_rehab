<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient__informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->integer('informant_id')->unsigned();
            $table->foreign('informant_id')->references('id')->on('patient__informants');
            $table->string('referred_by');
            $table->string('drugs_abused');
            $table->string('chief_complaint');
            $table->text('h_present_illness');
            $table->text('h_drug_abuse');
            $table->text('famper_history');
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
        Schema::dropIfExists('patient__informations');
    }
}
