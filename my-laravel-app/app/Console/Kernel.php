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

        // $schedule->command(HelloCommand::class)
        //     ->description('Hello command Scheduler')
        //     ->everyMinute();


        // $event = $schedule->command('inspire')
        //                 ->hourly();
        // dd($event->expression); // "0 * * * *"


        // $event = $schedule->command('inspire');


        // $event->hourly();
        // $event->cron('1 * * * *');


        // dd($event->expression); // hourly()      : "0 * * * *"
        // dd($event->expression); // everyMinute() : "* * * * *"


        // $schedule->command(HelloCommand::class)->description('Hello command Scheduler');
        // $event = $schedule->command(HelloCommand::class)->description('Hello command Scheduler');

        // $TIME = 1;

        // $ct = $TIME + 20;
        // $cron = $ct . ' * * * *';
        // dd($cron);
        // $event = $schedule->command(HelloCommand::class)->description('Hello command Scheduler')->cron($cron);
        // $event = $schedule->command(HelloCommand::class)->description('Hello command Scheduler')->cron('* * * * *');


        // $event = $schedule->command(HelloCommand::class)->description('Hello command Scheduler')->everyMinute();  // OK
        // $event = $schedule->command(HelloCommand::class)->description('Hello command Scheduler')->cron('* * * * *');  // OK
        // $event = $schedule->command(HelloCommand::class)->description('Hello command Scheduler')->cron('* 1 * * *');  // OK
        // $event = $schedule->command(HelloCommand::class)->description('Hello command Scheduler')->cron('37 * * * *');


        // $event01 = $schedule->command(HelloCommand::class)->description('Hello command Scheduler')->everyMinute();
        // dump($event01->expression);  //=> "* * * * *"

        // $event02 = $schedule->command(HelloCommand::class)->description('Hello command Scheduler')->hourly();
        // dump($event02->expression);  //=> "0 * * * *"

        // $event03 = $schedule->command(HelloCommand::class)->description('Hello command Scheduler')->cron('* * * * *');
        // dump($event03->expression);  //=> "0 * * * *"


        // $JOB05_CONF = '23 * * * *';

        // $event05 = $schedule->command(HelloCommand::class)->description('Hello command Scheduler')->cron($JOB05_CONF);
        // dump($event05->expression);  //=> "21 * * * *"




        // // $JOB06_CONF = '*/1 * * * *';
        // $JOB06_CONF = '* */1 * * *';

        // $event06 = $schedule->command(HelloCommand::class)->description('Hello command Scheduler')->cron($JOB06_CONF);
        // dump($event06->expression);  //=> "*/1 * * * *"



        // $event = $schedule->command(HelloCommand::class)->description('Hello command Scheduler')->cron('1 * * * *')->onOneServer()->withoutOverlapping();
        // $schedule->command('GetNewsUpdates:getnews')->cron('0 */4 * * *')->withoutOverlapping(10)->sendOutputTo('/root/logs/laravel_output.log');


        // dd($event->expression);


        // $MINUTE = 10;

        // $events = [];
        // for($i=0; $i<=1; $i++){
        //     $cronParam = ($MINUTE + $i) . ' * * * *';
        //     $events[] = $schedule->command(HelloCommand::class)->description('Hello command Scheduler')->cron($cronParam);
        // }


        $event = $schedule->command(HelloCommand::class)->description('Hello command Scheduler')->cron('* * * * *');

        // $JOB07_CONF = '59 * * * *';

        // // $event07 = $schedule->command(HelloCommand::class)->description('Hello command Scheduler')->cron($JOB07_CONF);
        // $event07 = $schedule->command(HelloCommand::class)->description('Hello command Scheduler')->hourly();




        // dd($events);


// $array2 = [];
// array_push($array2, "a");
// array_push($array2, "bb");

// //配列を設定する
// $fruits = ['apple', 'orange', 'melon'];
// //値を追加する
// $fruits[] = 'banana';
// $fruits[] = 'pineapple';


        // dd($event->expression);
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
