<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed roles
        $role_admin = Role::updateOrCreate([
            'name' => 'admin'
        ]);

        $role_editor = Role::updateOrCreate([
            'name' => 'editor'
        ]);

        // Seed permissions

        $permission_create_role = Permission::updateOrCreate([
            'name' => 'create role'
        ]);

        $permission_read_role = Permission::updateOrCreate([
            'name' => 'read role'
        ]);

        $permission_update_role = Permission::updateOrCreate([
            'name' => 'update role'
        ]);

        $permission_delete_role = Permission::updateOrCreate([
            'name' => 'delete role'
        ]);

        // Seed Lesson

        $permission_create_lesson = Permission::updateOrCreate([
            'name' => 'create lesson'
        ]);

        $permission_read_lesson = Permission::updateOrCreate([
            'name' => 'read lesson'
        ]);

        $permission_update_lesson = Permission::updateOrCreate([
            'name' => 'update lesson'
        ]);

        $permission_delete_lesson = Permission::updateOrCreate([
            'name' => 'delete lesson'
        ]);

        // Seed Category

        $permission_create_category = Permission::updateOrCreate([
            'name' => 'create category'
        ]);

        $permission_read_category = Permission::updateOrCreate([
            'name' => 'read category'
        ]);

        $permission_update_category = Permission::updateOrCreate([
            'name' => 'update category'
        ]);

        $permission_delete_category = Permission::updateOrCreate([
            'name' => 'delete category'
        ]);

        $permission_admin = [
            $permission_create_role,
            $permission_read_role,
            $permission_update_role,
            $permission_delete_role,
            $permission_create_lesson,
            $permission_read_lesson,
            $permission_update_lesson,
            $permission_delete_lesson,
            $permission_create_category,
            $permission_read_category,
            $permission_update_category,
            $permission_delete_category
        ];

        $permission_editor = [
            $permission_create_lesson,
            $permission_read_lesson,
            $permission_update_lesson,
            $permission_delete_lesson,
            $permission_create_category,
            $permission_read_category,
            $permission_update_category,
            $permission_delete_category
        ];

        $role_admin->syncPermissions($permission_admin);
        $role_editor->syncPermissions($permission_editor);
    }
}
