<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reviewRequestSave = Permission::where('slug', Permission::PERMISSIONS['review-comment:save'])->first();
        $admin = new Role();
        $admin->title = 'Admin';
        $admin->slug = Role::ROLES['admin'];
        $admin->save();
        $admin->permissions()->attach($reviewRequestSave);

        $reviewSave = Permission::where('slug', Permission::PERMISSIONS['review:save'])->first();
        $reviewsRead = Permission::where('slug', Permission::PERMISSIONS['reviews:read'])->first();
        $customer = new Role();
        $customer->title = 'Customer';
        $customer->slug = Role::ROLES['customer'];
        $customer->save();
        $customer->permissions()->attach($reviewSave);
        $customer->permissions()->attach($reviewsRead);
    }
}
