<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	protected $toTruncate = [ 'articles', 'users', 'permissions', 'roles'];
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		Schema::disableForeignKeyConstraints();
		foreach ($this->toTruncate as $table)
			DB::table($table)->truncate();
		Schema::enableForeignKeyConstraints();

		$this->call(RolesTableSeeder::class);
		$this->call(UsersTableSeeder::class);
		$this->call(CommentsTableSeeder::class);

		$this->command->info('========== Someblog app seeds finished. ==========');
	}
}