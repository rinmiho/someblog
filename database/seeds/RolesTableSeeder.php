<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('roles')->insert([
		    ['name' => 'admin'],
		    ['name' => 'moderator'],
		    ['name' => 'user']
	    ]);

	    $entities = ['articles', 'comments', 'users', 'roles', 'permissions'];
	    foreach ($entities as $entity) {
		    DB::table('permissions')->insert([
			    ['name' => 'create '.$entity],
			    ['name' => 'edit '.$entity],
			    ['name' => 'update '.$entity],
			    ['name' => 'delete '.$entity],
		    ]);
	    }
	    /*$permissions = Permission::all()->get();
	    foreach ($permissions as $permission)
	    {
		    DB::table('role_has_permissions')->insert([
			    ['permission_id' => $permission->id],
			    ['role_id' => Role::where('name', '=', 'admin')->id],
		    ]);
		    if (preg_match("/\barticles\b/i", $permission->name)) {
			    DB::table('role_has_permissions')->insert([
				    ['permission_id' => $permission->id],
				    ['role_id' => Role::where('name', '=', 'admin')->id],
			    ]);
		    } else {
			    echo "Вхождение не найдено.";
		    }
	    }*/

    }
}
