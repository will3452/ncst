<?php

use App\User;
use Illuminate\Database\Seeder;

class UserAdministrator extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'type' => User::TYPE_ADMINISTRATOR,
            'name' => 'Administrator',
            'password' => bcrypt('password'),
            'email' => 'super@admin.com',
        ]);
    }
}
