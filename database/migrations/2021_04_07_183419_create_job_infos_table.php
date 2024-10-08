<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('title')->nullable();
            $table->string('EmployeeId')->nullable();
            $table->string('supervisor')->nullable();
            $table->string('department')->nullable();
            $table->string('Wlocation')->nullable();
            $table->string('Cphone')->nullable();
            $table->string('Wphone')->nullable();
            $table->string('Wemail')->nullable();
            $table->string('Sdate')->nullable();
            $table->string('salary')->nullable();
            $table->string('currency')->nullable();
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
        Schema::dropIfExists('job_infos');
    }
}
