<?php

namespace App\Services;

use App\Jobs\CreateReview;
use App\Models\User;

class ReviewService implements ReviewServiceInterface
{
    /**
     * @param User $author
     * @param array $reviewData
     * @return void
     */
    public function create(User $author, array $reviewData): void
    {
        CreateReview::dispatch(array_merge($reviewData, ['user_id' => $author->id]));
    }
}
