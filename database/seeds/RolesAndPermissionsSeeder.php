<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        // Permission::create(['name' => 'edit articles']);

        $role_admin = Role::create(['name' => 'Admin']);
        $role_teacher = Role::create(['name' => 'mugallym']);
        $role_parent = Role::create(['name' => 'ene_ata']);
        $role_student = Role::create(['name' => 'okuwcy']);

        // $role->givePermissionTo('edit articles');
    }
}
