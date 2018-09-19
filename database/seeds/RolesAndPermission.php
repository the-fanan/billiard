<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Reset Cache roles and Permission
        app()['cache']->forget('spatie.permission.cache');

        //Create Permissions
       Permission::create(['name' => 'privilege-management','guard_name' => 'admin']);
       Permission::create(['name' => 'add-role','guard_name' => 'admin']);
       Permission::create(['name' => 'delete-role','guard_name' => 'admin']);
       Permission::create(['name' => 'sync-permission','guard_name' => 'admin']);
       Permission::create(['name' => 'admin-management','guard_name' => 'admin']);
       Permission::create(['name' => 'add-admin','guard_name' => 'admin']);
       Permission::create(['name' => 'update-admin','guard_name' => 'admin']);
       Permission::create(['name' => 'delete-admin','guard_name' => 'admin']);
       Permission::create(['name' => 'user-management','guard_name' => 'admin']);
       Permission::create(['name' => 'add-user','guard_name' => 'admin']);
       Permission::create(['name' => 'update-user','guard_name' => 'admin']);
       Permission::create(['name' => 'delete-user','guard_name' => 'admin']);
       Permission::create(['name' => 'add-payment','guard_name' => 'admin']);
       Permission::create(['name' => 'update-payment','guard_name' => 'admin']);
       Permission::create(['name' => 'delete-payment','guard_name' => 'admin']);
       Permission::create(['name' => 'add-item','guard_name' => 'admin']);
       Permission::create(['name' => 'update-item','guard_name' => 'admin']);
       Permission::create(['name' => 'delete-item','guard_name' => 'admin']);
       Permission::create(['name' => 'add-item','guard_name' => 'web']);
       Permission::create(['name' => 'update-item','guard_name' => 'web']);
       Permission::create(['name' => 'delete-item','guard_name' => 'web']);

       //admin roles
        $super = Role::create(['name' => 'Super Admin','guard_name' => 'admin']);
        $ordinary = Role::create(['name' => 'Admin','guard_name' => 'admin']);

        $super->givePermissionTo('privilege-management');
        $super->givePermissionTo('add-role');
        $super->givePermissionTo('delete-role');
        $super->givePermissionTo('sync-permission');
        $super->givePermissionTo('admin-management');
        $super->givePermissionTo('add-admin');
        $super->givePermissionTo('update-admin');
        $super->givePermissionTo('delete-admin');
        $super->givePermissionTo('user-management');
        $super->givePermissionTo('add-user');
        $super->givePermissionTo('update-user');
        $super->givePermissionTo('delete-user');
        $super->givePermissionTo('add-payment');
        $super->givePermissionTo('update-payment');
        $super->givePermissionTo('delete-payment');
        $super->givePermissionTo('add-item');
        $super->givePermissionTo('update-item');
        $super->givePermissionTo('delete-item');



        $ordinary->givePermissionTo('admin-management');
        $ordinary->givePermissionTo('user-management');
        $ordinary->givePermissionTo('add-user');
        $ordinary->givePermissionTo('update-user');
        $ordinary->givePermissionTo('delete-user');
        $ordinary->givePermissionTo('add-payment');
        $ordinary->givePermissionTo('update-payment');
        $ordinary->givePermissionTo('delete-payment');
        $ordinary->givePermissionTo('add-item');
        $ordinary->givePermissionTo('update-item');
        $ordinary->givePermissionTo('delete-item');
        //ordinary user roles
        //Creating User Role
       $technician = Role::create(['name' => 'technician','guard_name' => 'web']);
       $customer = Role::create(['name' => 'customer','guard_name' => 'web']);
       $reviewer = Role::create(['name' => 'reviewer','guard_name' => 'web']);

       $technician->givePermissionTo('add-item');
       $technician->givePermissionTo('update-item');
       $technician->givePermissionTo('delete-item');

       $customer->givePermissionTo('add-item');
       $customer->givePermissionTo('update-item');
       $customer->givePermissionTo('delete-item');

       $reviewer->givePermissionTo('add-item');
       $reviewer->givePermissionTo('update-item');
       $reviewer->givePermissionTo('delete-item');

    }
}
