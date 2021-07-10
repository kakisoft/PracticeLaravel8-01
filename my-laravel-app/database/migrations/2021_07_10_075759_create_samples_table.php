<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samples', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('名前');
            $table->text('content')->nullable()->comment('コンテンツ');
            $table->integer('foo_id')->unsigned()->nullable()->comment('何かのID(int)');
            $table->bigInteger('owner_id')->default(0)->nullable();
            $table->longText('payload')->nullable();
            $table->unsignedTinyInteger('attempts')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('samples');
    }
}
