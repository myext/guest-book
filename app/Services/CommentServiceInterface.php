<?php

namespace App\Services;

use App\Models\User;

interface CommentServiceInterface
{
    /**
     * @param User $author
     * @param array $commentData
     * @return void
     */
    public function create(User $author, array $commentData): void;
}
