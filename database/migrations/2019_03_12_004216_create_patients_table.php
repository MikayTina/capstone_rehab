<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patient_id');
            $table->string('fname');
            $table->string('lname');
            $table->char('mname',2);
            $table->integer('age');
            $table->date('birthdate');
            $table->integer('birthorder')->nullable();
            $table->integer('address_id')->unsigned();
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->string('contact')->nullable();;
            $table->string('gender')->nullable();;
            $table->string('civil_status');
            $table->string('nationality')->nullable();;
            $table->string('religion')->nullable();;
            $table->string('case')->nullable();;
            $table->string('submission')->nullable();;
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->string('flag')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
