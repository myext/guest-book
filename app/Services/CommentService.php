<?php

namespace App\Services;

use App\Jobs\CreateComment;
use App\Models\User;

class CommentService implements CommentServiceInterface
{
    /**
     * @param User $author
     * @param array $commentData
     * @return void
     */
    public function create(User $author, array $commentData): void
    {
        CreateComment::dispatch(array_merge($commentData, ['user_id' => $author->id]));
    }
}
