<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\PodcastProcessed;
use App\Listeners\SendPodcastNotification;
use function Illuminate\Events\queueable;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // 'Eventクラス' => [
        //     'Eventクラスに対応した Listner クラス',
        // ],

        // Registered::class, SendEmailVerificationNotification::class は、Laravel 標準の user に紐づいたクラス？  
        // 対応するファイルが自動生成されなかった。  
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        // ↓のように階層を指定しない場合、「Providers」フォルダに生成される。
        PublishProcessor::class => [   // app\Providers\PublishProcessor.php
            MessageSubscriber::class   // app\Providers\MessageSubscriber.php
        ],
        ReviewRegistered::class => [   // app\Providers\ReviewRegistered.php
            ReviewIndexCreator::class  // app\Providers\ReviewIndexCreator.php
        ],

        // ↓のように書くと、「Events」「Listeners」の階層にファイルが作成される。
        'App\Events\AccessDetection' => [
            'App\Listeners\AccessDetectionListener',
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot(): void
    {
        //
        // Event::listen();


        Event::listen(
            PodcastProcessed::class,
            [SendPodcastNotification::class, 'handle']
        );

        Event::listen(function (PodcastProcessed $event) {
            //
        });

        //-----------------------------------------------
        //     Queueable Anonymous Event Listeners
        //-----------------------------------------------
        Event::listen(queueable(function (PodcastProcessed $event) {
            //
        }));
    }
}
