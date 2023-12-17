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
        Schema::create('employee_transaction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('epl_id');
            $table->unsignedBigInteger('tsc_id');
            $table->timestamps();

            $table->foreign('tsc_id')->references('tsc_id')->on('transaction')->onDelete('cascade');
            $table->foreign('epl_id')->references('epl_id')->on('employee')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_transaction');
    }
};
