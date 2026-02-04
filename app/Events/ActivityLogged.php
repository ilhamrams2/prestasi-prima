<?php

namespace App\Events;

use App\Models\prestasiprima\ActivityLog;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ActivityLogged implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $log;

    /**
     * Create a new event instance.
     */
    public function __construct(ActivityLog $log)
    {
        $this->log = $log;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('admin-activity'),
        ];
    }

    public function broadcastAs()
    {
        return 'ActivityLogged';
    }

    public function broadcastWith()
    {
        return [
            'description' => $this->log->description,
            'user' => $this->log->user_name,
            'time' => $this->log->created_at->diffForHumans(),
            'action' => $this->log->action,
        ];
    }
}
