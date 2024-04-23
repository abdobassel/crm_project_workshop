<?php

namespace App\Events;

use App\Models\Project;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ProjectCreation
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private Project $project;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Project $project)
    {
        $this->setProject($project);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    public function setProject(project $project): void
    {
        $this->project = $project;
    }
    public function getproject(): Project
    {
        return  $this->project;
    }
}
