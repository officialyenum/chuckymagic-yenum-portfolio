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
        $user = User::where('email','oponechukwuyenum@gmail.com')->first();
        if (!$user) {
            User::create([
                'id' => 10000001,
                'name' => 'Opone Yenum',
                'email' => 'oponechukwuyenum@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('password')
            ]);
        }
    }
}
