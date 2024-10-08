<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_templates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained();
            $table->string('salutation')->nullable();
            $table->string('Fname')->nullable();
            $table->string('street')->nullable();
            $table->string('apartment')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('Zcode')->nullable();
            $table->string('Hphone')->nullable();
            $table->string('Aphone')->nullable();
            $table->string('Pemail')->nullable();
            $table->string('nationalId')->nullable();
            $table->string('Krapin')->nullable();
            $table->string('nssf')->nullable();
            $table->string('nhif')->nullable();
            $table->string('Bankname')->nullable();
            $table->string('AccNo')->nullable();
            $table->string('Branchname')->nullable();
            $table->string('Branchcode')->nullable();
            $table->string('dob')->nullable();
            $table->string('status')->nullable();
            $table->string('spouseN')->nullable();
            $table->string('spouseE')->nullable();
            $table->string('spousePhone')->nullable();
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
        Schema::dropIfExists('employee_templates');
    }
}
