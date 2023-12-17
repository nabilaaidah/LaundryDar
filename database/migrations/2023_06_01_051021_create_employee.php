<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id('epl_id');
            $table->string('epl_name');
            $table->string('epl_jobtitle');
            $table->string('epl_phonenumber')->unique();
            $table->string('epl_gender');
            $table->decimal('epl_salary', 10, 2);
            $table->integer('epl_age');
            $table->string('epl_workstatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
