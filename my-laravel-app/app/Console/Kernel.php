<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Console\Scheduling\ManagesFrequencies;  // spliceIntoPosition
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\HelloCommand;

class Kernel extends ConsoleKernel
{
    use ManagesFrequencies;

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        // //---------------------------------------------
        // //            クラス名を指定
        // //---------------------------------------------
        // $schedule->command(HelloCommand::class)
        //     ->description('Hello command Scheduler')
        //     ->everyMinute();


        // //---------------------------------------------
        // //             コマンド名を指定
        // //---------------------------------------------
        // $schedule->command('hello:class')
        //     ->description('Hello command Scheduler')
        //     ->everyMinute();


        // //---------------------------------------------
        // //                 cron
        // //---------------------------------------------
        // $event = $schedule->command(HelloCommand::class)->description('Hello command Scheduler')->cron('* * * * *');
        // // dump($event->expression);  //=> "* * * * *"


    }

    public function weekly()
    {
        return $this->spliceIntoPosition(1, 0)
                    ->spliceIntoPosition(2, 0)
                    ->spliceIntoPosition(5, 0);
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
