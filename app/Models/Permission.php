<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    const PERMISSIONS = [
        'review:save' => 'review:save',
        'reviews:read' => 'reviews:read',
        'review-comment:save' => 'review-comment:save',
    ];

    use HasFactory;

    /**
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class,'roles_permissions');
    }
}
