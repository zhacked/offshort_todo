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
        Schema::create('techtimes', function (Blueprint $table) {
            $table->id();
            $table->string('techID');
            $table->string('timeIn');
            $table->string('timeOut');
            $table->string('duration');
            $table->string('type');
            $table->string('status');
            $table->date('techDate');
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
        Schema::dropIfExists('techtimes');
    }
}
