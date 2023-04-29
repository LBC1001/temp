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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('employee_id')->references('id')->on('users')->constrained();
            $table->string('monday_am_start_time')->nullable();
            $table->string('monday_am_end_time')->nullable();
            $table->string('monday_pm_start_time')->nullable();
            $table->string('monday_pm_end_time')->nullable();
            $table->string('tuesday_am_start_time')->nullable();
            $table->string('tuesday_am_end_time')->nullable();
            $table->string('tuesday_pm_start_time')->nullable();
            $table->string('tuesday_pm_end_time')->nullable();
            $table->string('wednesday_am_start_time')->nullable();
            $table->string('wednesday_am_end_time')->nullable();
            $table->string('wednesday_pm_start_time')->nullable();
            $table->string('wednesday_pm_end_time')->nullable();
            $table->string('thursday_am_start_time')->nullable();
            $table->string('thursday_am_end_time')->nullable();
            $table->string('thursday_pm_start_time')->nullable();
            $table->string('thursday_pm_end_time')->nullable();
            $table->string('friday_am_start_time')->nullable();
            $table->string('friday_am_end_time')->nullable();
            $table->string('friday_pm_start_time')->nullable();
            $table->string('friday_pm_end_time')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
