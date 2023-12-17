<?php

namespace App\Console\Commands;

use App\Models\employee;
use Illuminate\Console\Command;

class UpdateTimeStamps extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-time-stamps';
    protected $description = 'Update created_at and updated_at fields in the database';
    public function handle()
    {
        employee::query()->update([
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->info('Employee Timestamps updated successfully');
    }
}
