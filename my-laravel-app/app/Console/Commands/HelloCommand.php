<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class HelloCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hello:class';  // この Command クラスを実行するためのコマンド名。（ COMMAND : php artisan hello:class

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'サンプルコマンド（クラス）'; // php artisan list での説明文

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->comment('Hello class command');  // Command で実行する処理
        echo "Hello class command";  // ブラウザから Command を起動する場合、comment の内容は表示されない

        // return 0;
    }
}
