<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	$role_user 	=  Role::where('name','User')->first();
    	$role_admin	=  Role::where('name','Admin')->first();

    	$user = new User();
	    $user->name = 'User Name';
	    $user->email = 'user@example.com';
	    $user->password = bcrypt('123456');
	    $user->save();
	    $user->roles()->attach($role_user);
	    
	    $admin = new User();
	    $admin->name = 'Admin Name';
	    $admin->email = 'admin@example.com';
	    $admin->password = bcrypt('123456');
	    $admin->save();
	    $admin->roles()->attach($role_admin);

    }

}
