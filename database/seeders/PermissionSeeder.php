<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $permissions=['show user'];
        $permissions=collect($permissions)->map(function ($permission){
           return ["name"=>$permission,'guard_name'=>'web'];
        });

        Permission::insert($permissions->toArray());
    }
}
