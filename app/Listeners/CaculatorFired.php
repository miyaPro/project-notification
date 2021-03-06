<?php

namespace App\Listeners;

use App\Events\ CaculatorEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class CaculatorFired
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
        Log::info('CaculatorFired __construct');
    }

    /**
     * Handle the event.
     *
     * @param   CaculatorEvent  $event
     * @return void
     */
    public function handle( CaculatorEvent $event)
    {
        //
        Log::info('CaculatorFired handle');
        $redis = Redis::connection();
        $redis->publish('message', 'msg');
    }
}
