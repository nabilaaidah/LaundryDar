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
        Schema::create('delivery', function (Blueprint $table) {
            $table->id('div_id');
            $table->timestamp('div_date')->nullable();
            $table->decimal('div_price', 10, 2);
            $table->string('div_address');
            $table->unsignedBigInteger('transaction_tsc_id');
            $table->foreign('transaction_tsc_id')->references('tsc_id')->on('transaction')->onDelete('cascade');
            $table->unsignedBigInteger('employee_epl_id');
            $table->foreign('employee_epl_id')->references('epl_id')->on('employee')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery');
    }
};
