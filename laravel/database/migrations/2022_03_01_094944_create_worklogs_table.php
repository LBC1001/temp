<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worklogs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('employee_id')->references('id')->on('users')->constrained();
            $table->foreignId('employer_id')->references('id')->on('users')->constrained();
            $table->string('pre_image')->nullable();
            $table->string('hash')->nullable();
            $table->string('dlt_transaction_id')->nullable();
            $table->dateTime('from');
            $table->dateTime('until');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('worklogs');
    }
};
