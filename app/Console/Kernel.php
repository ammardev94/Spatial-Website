<?php

namespace App\Console;

use Illuminate\Support\Facades\Log;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Heartbeat log to verify cron is working
        $schedule->call(function () {
            Log::info('Laravel Scheduler Heartbeat: Cron is working fine.');
        })->everyMinute();

        // Refresh economic data daily at 2 AM
        $schedule->command('economic:warmup')->dailyAt('02:00')->withoutOverlapping();

        // Sync new indicator codes monthly
        $schedule->command('economic:generate-codes')->monthly()->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}