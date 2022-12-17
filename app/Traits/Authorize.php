<?php

namespace App\Traits;

trait Authorize
{
    /**
     * @param $permissionSlug
     * @return bool
     */
    public function hasPermission($permissionSlug): bool
    {
        foreach ($this->roles as $role) {
            if ($role->permissions->where('slug', $permissionSlug)->count() > 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return array
     */
    public function getPermissions(): array
    {
        $permissions = [];
        foreach ($this->roles as $role) {
            $permissions = array_merge($permissions, $role->permissions->pluck('slug')->toArray());
        }

        return $permissions;
    }
}
