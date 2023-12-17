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
        Schema::create('transaction_detail', function (Blueprint $table) {
            $table->id('tsc_td_id');
            $table->integer('tsc_td_quantity');
            $table->decimal('tsc_td_pricequantity', 10, 2);
            $table->unsignedBigInteger('service_svc_id');
            $table->foreign('service_svc_id')->references('svc_id')->on('service')->onDelete('cascade');
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
        Schema::dropIfExists('transaction_detail');
    }
};
