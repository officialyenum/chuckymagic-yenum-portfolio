<?php

use App\Models\User;
use App\Models\Role;
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
        Role::create([
            'id'=> 1,
            'name'=> 'Super Admin',
        ]);
        Role::create([
            'id'=> 2,
            'name'=> 'Admin',
        ]);
        Role::create([
            'id'=> 3,
            'name'=> 'Writer',
        ]);
        Role::create([
            'id'=> 4,
            'name'=> 'User',
        ]);
        $user = User::where('email','admin@yenum.dev')->first();
        if (!$user) {
            User::create([
                'username' => 'superadmin',
                'firstname' => 'Superadmin',
                'lastname' => 'Yenum',
                'email' => 'superadmin@yenum.dev',
                'role_id' => 1,
                'password' => Hash::make('password')
            ]);
            User::create([
                'username' => 'admin',
                'firstname' => 'Admin',
                'lastname' => 'Yenum',
                'email' => 'admin@yenum.dev',
                'role_id' => 2,
                'password' => Hash::make('password')
            ]);
            User::create([
                'username' => 'yenum',
                'firstname' => 'Yenum',
                'lastname' => 'Opone',
                'email' => 'oponechukwuyenum@gmail.com',
                'role_id' => 3,
                'password' => Hash::make('password')
            ]);


            User::create([
                'username' => 'johndoe',
                'firstname' => 'john',
                'lastname' => 'doe',
                'email' => 'john@doe.com',
                'phone' => '07064482201',
                'role_id' => 4,
                'password' => Hash::make('password')
            ]);
        }
    }
}
