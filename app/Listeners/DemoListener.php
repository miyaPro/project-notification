<?php

namespace App\Listeners;

use App\Events\DemoEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class DemoListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
        Log::info('DemoListener __construct');
    }

    /**
     * Handle the event.
     *
     * @param  DemoEvent  $event
     * @return void
     */
    public function handle(DemoEvent $event)
    {
        //
        Log::info('DemoListener handle');
        Log::info(print_r($event, true));
        $redis =Redis::connection();
        $redis->publish('message', 'tang');
    }
}
