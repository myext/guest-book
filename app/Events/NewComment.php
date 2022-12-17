<?php

namespace App\Events;

use App\Models\Comment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewComment implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private int $commentId;
    private ?Comment $comment = null;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($commentId)
    {
        $this->commentId = $commentId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel("comments.{$this->getComment()->user->id}");
    }

    /**
     * @return string
     */
    public function broadcastAs(): string
    {
        return 'new-comment';
    }

    /**
     * @return array
     */
    public function broadcastWith(): array
    {
        $comment = $this->getComment();
        return [
            'review-subject' => $comment->review->subject,
            'content' => $comment->content,
            'date' => $comment->created_at
        ];
    }

    /**
     * @return Comment
     */
    private function getComment(): Comment
    {
        if (!$this->comment) {
            $this->comment = Comment::find($this->commentId);
        }

        return $this->comment;
    }
}
