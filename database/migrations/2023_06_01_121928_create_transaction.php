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
        Schema::create('transaction', function (Blueprint $table) {
            $table->id('tsc_id');
            $table->string('tsc_status');
            $table->date('tsc_tglmasuk');
            $table->date('tsc_tglselesai')->nullable();
            $table->date('tsc_tglambil')->nullable();
            $table->decimal('tsc_totalprice', 10, 2);
            $table->unsignedBigInteger('customer_cst_id');
            $table->foreign('customer_cst_id')->references('cst_id')->on('customer')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
