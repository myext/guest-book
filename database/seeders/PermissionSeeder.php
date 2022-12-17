<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reviewSave = new Permission();
        $reviewSave->title = 'Save review';
        $reviewSave->slug = Permission::PERMISSIONS['review:save'];
        $reviewSave->save();
        $reviewsRead = new Permission();
        $reviewsRead->title = 'Read all reviews';
        $reviewsRead->slug = Permission::PERMISSIONS['reviews:read'];
        $reviewsRead->save();
        $reviewRequestSave = new Permission();
        $reviewRequestSave->title = 'Save review request';
        $reviewRequestSave->slug = Permission::PERMISSIONS['review-comment:save'];
        $reviewRequestSave->save();
    }
}
