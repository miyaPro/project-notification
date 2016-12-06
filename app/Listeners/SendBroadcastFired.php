<?php

namespace App\Listeners;

use App\Events\BroadcastEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use LRedis;

class SendBroadcastFired
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
        Log::info('listener __construct');
    }

    /**
     * Handle the event.
     *
     * @param  BroadcastEvent  $event
     * @return void
     */
    public function handle(BroadcastEvent $event)
    {
        //
        Log::info('listener handel');
//        LRedis

        $redis = LRedis::connection();
        $redis->publish('message', $total);
    }
}
