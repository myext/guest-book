<?php

namespace App\Services;

use App\Models\User;

interface ReviewServiceInterface
{
    /**
     * @param User $author
     * @param array $reviewData
     * @return void
     */
    public function create(User $author, array $reviewData): void;
}
