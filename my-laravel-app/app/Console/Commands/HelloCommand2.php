<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Output\OutputInterface;
use App\Models\Item;

class HelloCommand2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // php artisan hello:class2 kaki
    protected $signature = 'hello:class2 {name} {--switch=default}';                 // 引数を文字列として取得。省略時、右辺の内容が入る。           COMMAND :  php artisan hello:class2 kaki

    /*
    protected $signature = 'hello:class2';                 //                                    COMMAND :  php artisan hello:class2
    protected $signature = 'hello:class2 {name}';          // 引数を１つ指定（過不足があるとエラー） COMMAND :  php artisan hello:class2 kaki
    protected $signature = 'hello:class2 {name} {age}';    // 引数を複数指定（過不足があるとエラー） COMMAND :  php artisan hello:class2 kaki 20
    protected $signature = 'hello:class2 {name?}';         // 引数省略可                           COMMAND :  php artisan hello:class2 kaki
    protected $signature = 'hello:class2 {name=kaki}';     // デフォルト引数                       COMMAND :  php artisan hello:class2 kaki

    // 引数に説明をつける : Help用に説明をつけることができます。引数定義に、コロン区切りで記述します。
    protected $signature = 'hello:class2 {name : 名前を指定} {age? : 年齢を指定}';
    protected $signature = 'hello:class2 {name=laravel : 名前を指定} {age? : 年齢を指定}';

    // オプション引数
    protected $signature = 'hello:class2 {name} {--switch}';                         // 引数を論理値として取得。指定すると true、省略すると false。 COMMAND :  php artisan hello:class2 kaki --switch
    protected $signature = 'hello:class2 {name} {--switch=}';                        // 引数を文字列として取得。省略可。                           COMMAND :  php artisan hello:class2 kaki --switch
    protected $signature = 'hello:class2 {name} {--switch=default}';                 // 引数を文字列として取得。省略時、右辺の内容が入る。           COMMAND :  php artisan hello:class2 kaki
    protected $signature = 'hello:class2 {name} {--switch=*}';                       // 引数を配列として取得。--switch=1　--switch=2 と指定すると、['1','2']。  取得した値は comment メソッドで出力できない？  COMMAND :  php artisan hello:class2 kaki --switch=1 --switch=2
    protected $signature = 'hello:class2 {name} {--switch : switch_description}';    // 説明文。表示コマンドは「php artisan hello:class2 -h」  COMMAND :  php artisan hello:class2 kaki --switch
    */


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    /**
     * 
     *
     * 
     */
    private $item;
    private $useCase;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Item $item)
    {
        parent::__construct();

        $this->item    = $item;
        $this->useCase = $item;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //=================================
        //              引数
        //=================================
        $name = $this->argument('name');
        $this->comment('Hello ' . $name);

        //=================================
        //        オプション引数
        //=================================
        $switch = $this->option('switch');  // --switch
        $this->comment('Hello ' . ($switch ? 'ON' : 'OFF') );
        $this->comment('$switch : ' . $switch );
        var_dump($switch);


        //=================================
        //        コンソール出力
        //=================================
        // コンソール出力時の文字色や背景色が異なる
        $this->line('Display this on the screen');   // line($string, $style=null, $verbosity=null)     You may use the line method to display plain, uncolored text:
        $this->info('The command was successful!');  // Typically, the info method will display in the console as green colored text:
        $this->comment('comment');
        $this->error('Something went wrong!');       // To display an error message, use the error method. Error message text is typically displayed in red
        $this->question('question');
        $this->warn('warn');

        // 出力レベルを設定
        $this->info('VERBOSITY_QUIET'       , OutputInterface::VERBOSITY_QUIET);         // 常に出力。
        $this->info('VERBOSITY_NORMAL'      , OutputInterface::VERBOSITY_NORMAL);        // デフォルトの出力レベル。--quiet 以外で出力
        $this->info('VERBOSITY_VERBOSE'     , OutputInterface::VERBOSITY_VERBOSE);       // -v, -vv, -vvv で出力
        $this->info('VERBOSITY_VERY_VERBOSE', OutputInterface::VERBOSITY_VERY_VERBOSE);  // -vv, -vvv で出力
        $this->info('VERBOSITY_DEBUG'       , OutputInterface::VERBOSITY_DEBUG);         // -vvv でのみ出力

        // table
        $this->table(
            ['name', 'age'],
            [
                ['John', 20],
                ['Tom' , 35]
            ]
        );
        /*
        =>
        +------+-----+
        | name | age |
        +------+-----+
        | John | 20  |
        | Tom  | 35  |
        +------+-----+
        */

        //// 【 run 】
        // $tsv = $this->useCase->run($targetDate);
    }
}
