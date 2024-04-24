<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('app:voting-deadline')->cron('* * * * *');
        // $schedule->command('app:winning-user-generate')->cron('* * * * *');
        $schedule->command('app:remove-board')->cron('* * * * *');
        $schedule->command('app:payment-refund')->cron('* * * * *');
        // $schedule->command('app:voting-deadline')->dailyAt('00:00');
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
