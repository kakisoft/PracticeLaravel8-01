<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sample;

class SampleTableSeeder extends Seeder
{
    /*
        ＜実行コマンド＞
        php artisan db:seed --class=SampleTableSeeder

        ＜作成コマンド＞
        php artisan db:seed --class=SampleTableSeeder
    */

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // レコードをオールクリアしています。既存のレコードを残したい場合、ご注意ください
        Sample::truncate();

        // create sample records
        Sample::Create(['name' => 'SampleName01',]);
        Sample::Create(['name' => 'SampleName02',]);
        Sample::Create(['name' => 'SampleName03',]);
        Sample::Create(['name' => 'SampleName04',]);
        Sample::Create(['name' => 'SampleName05',]);
    }
}
