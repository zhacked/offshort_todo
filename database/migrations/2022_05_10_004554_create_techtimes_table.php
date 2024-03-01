<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechtimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('break_time', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('time_in');
            $table->string('time_out');
            $table->string('duration');
            $table->string('type');
            $table->string('status');
            $table->date('break_date');
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
        Schema::dropIfExists('break_time');
    }
}
