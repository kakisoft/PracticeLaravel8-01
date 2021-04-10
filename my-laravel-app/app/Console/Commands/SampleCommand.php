<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class SampleCommand extends Command
{
    //=====================================================================
    //  【コマンド実行により自動生成】　artisanコマンドとして登録するときの識別子
    //=====================================================================
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'command:name';  // Command カテゴリの「name」  // php artisan command:name

    // protected $signature = 'name';  // php artisan name

    // protected $signature = 'command:sample {name}';  // php artisan command:name arg1
    // protected $signature = 'command:sample {name} {age}';  // 引数を複数指定（過不足があるとエラー）
    // protected $signature = 'command:sample {name?}';  // 引数省略可
    // protected $signature = 'command:sample {name=laravel}';  // デフォルト引数

    // 引数に説明をつける : Help用に説明をつけることができます。引数定義に、コロン区切りで記述します。
    // protected $signature = 'command:sample {name=laravel : 名前を指定} {age? : 年齢を指定}';

    // 実行時オプションの定義をすることもできます。
    protected $signature = 'command:sample {--dry-run}';


    //=====================================================================
    //  【コマンド実行により自動生成】　コマンドの説明
    //=====================================================================
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description - "php artisan list" コマンドを打った時の説明文';


    //=====================================================================
    //  【コマンド実行により自動生成】　コンストラクタ
    //=====================================================================
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    //=====================================================================
    //  【コマンド実行により自動生成】　実際の処理を記述する
    //=====================================================================
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        // $name = $this->argument("name");
        // $this->info("Hello {$name}");

        $dry_run = $this->option("dry-run");
        if( $this->info("d: {$dry_run}") ){
            // true or false
        }

        //==========< コンソール出力 >==========
        $this->info('The command was successful!');  // Typically, the info method will display in the console as green colored text:
        $this->error('Something went wrong!');       // To display an error message, use the error method. Error message text is typically displayed in red
        $this->line('Display this on the screen');   // You may use the line method to display plain, uncolored text:

        // The table method makes it easy to correctly format multiple rows / columns of data.
        $this->table(
            ['Name', 'Email'],
            User::all(['name', 'email'])->toArray()
        );

        //==========<  改行 >==========
        $this->newLine();
        $this->newLine(3);




        // echo はあんまり使われない？
        echo "実行する内容" . PHP_EOL;



        return 0;
    }
}
