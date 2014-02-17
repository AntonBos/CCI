<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('GroupTableSeeder');
		$this->call('UserTableSeeder');
	}

}

class GroupTableSeeder extends Seeder{

	public function run()
    {
        DB::table('groups')->delete();
        DB::table('users_groups')->delete();

        Sentry::createGroup(array(
        'name'        => 'Admins',
        'permissions' => array(
            'admin' => 1,
            'users' => 1,
            'translators' => 1,
        )));
    }
}

class UserTableSeeder extends Seeder{

    public function run()
    {
        DB::table('users')->delete();

        $admin_users = array(
                array('first_name' => 'Rian', 'last_name' => 'Admin', 'email' => 'rian@digitalpro.co.za', 'password' => 'b0k0m0', 'activated' => '1'),
                array('first_name' => 'Barry', 'last_name' => 'Admin', 'email' => 'barry@digitalpro.co.za', 'password' => 'b0k0m0', 'activated' => '1')
        );

        $adminGroup = Sentry::findGroupByName('Admins');

        foreach($admin_users as $admin_user){

            $user = Sentry::createUser($admin_user);
            $user->addGroup($adminGroup);
        }
    }
}