<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user2 = new User();
        $user2->name = 'user';
        $user2->email = 'user@user.lt';
        $user2->password = bcrypt('12341234');
        $user2->role = 'employee';
        $user2->save();
    }
}
