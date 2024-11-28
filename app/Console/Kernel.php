<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Register the commands for the application.
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        // Adicione aqui os comandos agendados, como o exemplo abaixo:
        $schedule->command('ordens:delete-old')->dailyAt('18:00');
        $schedule->command('backup:database')->dailyAt('18:00');
    }
}
