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
        Schema::create('payment', function (Blueprint $table) {
            $table->id('pm_id');
            $table->string('pm_method');
            $table->timestamp('pm_date');
            $table->decimal('pm_amount', 10, 2);
            $table->decimal('pm_discount', 10, 2)->nullable();
            $table->unsignedBigInteger('transaction_tsc_id');
            $table->foreign('transaction_tsc_id')->references('tsc_id')->on('transaction')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
