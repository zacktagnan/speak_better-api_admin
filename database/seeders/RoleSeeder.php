<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::create([
            'name' => 'admin',
        ]);
        $role_editor = Role::create([
            'name' => 'editor',
        ]);

        $permission_create_role = Permission::create(['name' => 'create_roles']);
        $permission_read_role = Permission::create(['name' => 'read_roles']);
        $permission_update_role = Permission::create(['name' => 'update_roles']);
        $permission_delete_role = Permission::create(['name' => 'delete_roles']);

        $permission_create_lesson = Permission::create(['name' => 'create_lessons']);
        $permission_read_lesson = Permission::create(['name' => 'read_lessons']);
        $permission_update_lesson = Permission::create(['name' => 'update_lessons']);
        $permission_delete_lesson = Permission::create(['name' => 'delete_lessons']);

        $permission_create_category = Permission::create(['name' => 'create_categories']);
        $permission_read_category = Permission::create(['name' => 'read_categories']);
        $permission_update_category = Permission::create(['name' => 'update_categories']);
        $permission_delete_category = Permission::create(['name' => 'delete_categories']);

        $permissions_admin = [
            $permission_create_role, $permission_read_role, $permission_update_role, $permission_delete_role, $permission_create_lesson, $permission_read_lesson, $permission_update_lesson, $permission_delete_lesson, $permission_create_category, $permission_read_category, $permission_update_category, $permission_delete_category
        ];

        $permissions_editor = [
            $permission_create_lesson, $permission_read_lesson, $permission_update_lesson, $permission_delete_lesson, $permission_create_category, $permission_read_category, $permission_update_category, $permission_delete_category
        ];

        // Asignando permisos en conjunto:
        $role_admin->syncPermissions($permissions_admin);
        $role_editor->syncPermissions($permissions_editor);

        // De querer asignar un único permiso a un role de usuario:
        // $role_admin->givePermissionTo($permission_update_category);
    }
}
