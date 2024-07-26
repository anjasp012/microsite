<?php

namespace App\Listeners;

use App\Events\LogVisitor;
use App\Models\Visitor;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogVisitorListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(LogVisitor $event): void
    {
        Visitor::create([
            'ip_address' => $event->ipAddress,
            'country' => $event->country,
            'device' => $event->device,
            'browser' => $event->browser,
            'url' => $event->url,
        ]);
    }
}
