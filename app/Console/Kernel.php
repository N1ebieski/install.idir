<?php

namespace App\Console;

use Illuminate\Support\Facades\Config;
use Illuminate\Console\Scheduling\Schedule;
use N1ebieski\IDir\ValueObjects\Thumbnail\Driver;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        $schedule->command('queue:work --daemon --stop-when-empty --tries=3')->withoutOverlapping();

        /** @var Driver $driver */
        $driver = Config::get('idir.dir.thumbnail.driver');

        if ($driver->isEquals(Driver::Local)) {
            $schedule->command('queue:work --queue=thumbnail --daemon --stop-when-empty --tries=3')->withoutOverlapping();
        }
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
