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
        Schema::create('expense_employee', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exp_id');
            $table->unsignedBigInteger('epl_id');
            $table->timestamps();

            $table->foreign('exp_id')->references('exp_id')->on('expense')->onDelete('cascade');
            $table->foreign('epl_id')->references('epl_id')->on('employee')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expense_employee');
    }
};
