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
        Schema::create('expense', function (Blueprint $table) {
            $table->id('exp_id');
            $table->string('exp_type');
            $table->decimal('exp_totalexpense', 10, 2);
            $table->timestamp('exp_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expense');
    }
};
