<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer__requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('transfer_id');
            $table->integer('from_department')->unsigned();
            $table->foreign('from_department')->references('id')->on('departments');
            $table->integer('to_department')->unsigned();
            $table->foreign('to_department')->references('id')->on('departments');
            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->text('remarks');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('transfer__requests');
    }
}
