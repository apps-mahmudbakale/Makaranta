<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {

        $title = array('user', 'permission', 'role', 'product');
        foreach ($title as $value) {
            $permissions = array($value.'_create', $value.'_read', $value.'_edit', $value.'_delete');
             
             foreach ($permissions as $perm) {
                 $permission = new Permission;

                 $permission->title = $perm;
                 $permission->save();

             }
        }
       
    }
}
