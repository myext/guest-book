<?php

namespace App\Events;

use App\Models\Review;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewReview implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private int $reviewId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(int $reviewId)
    {
        $this->reviewId = $reviewId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('reviews');
    }

    /**
     * @return array
     */
    public function broadcastWith()
    {
        $review = Review::find($this->reviewId);
        return [
            'author' => $review->user->name,
            'subject' => $review->subject,
            'content' => $review->content,
            'date' => $review->created_at
        ];
    }

    /**
     * @return string
     */
    public function broadcastAs()
    {
        return 'new-review';
    }
}
