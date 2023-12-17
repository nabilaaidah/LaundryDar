<?php

namespace Database\Seeders;

use App\Models\customer;
use App\Models\employee;
use App\Models\expense;
use App\Models\service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TestingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maxId = expense::max('exp_id');
        $newId = $maxId + 1;

        expense::create([
            'exp_id' => $newId,
            'exp_type' => 'peralatan kasir',
            'exp_totalexpense' => 25000,
            'exp_date' => now(),
        ]);
    }
}
