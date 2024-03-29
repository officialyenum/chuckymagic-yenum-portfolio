<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'id' => 1,
            'name' => 'Super Admin',
        ]);
        Role::create([
            'id' => 2,
            'name' => 'Admin',
        ]);
        Role::create([
            'id' => 3,
            'name' => 'Writer',
        ]);
        Role::create([
            'id' => 4,
            'name' => 'User',
        ]);
        $user = User::where('email', 'admin@yenum.dev')->first();
        if (!$user) {
            User::create([
                'username' => 'superadmin',
                'firstname' => 'Admin',
                'lastname' => 'Super',
                'email' => 'administrator@yenum.dev',
                'role_id' => 1,
                'email_verified_at' => now(),
                'password' => Hash::make('administrator')
            ]);
            User::create([
                'username' => 'hybridcoder',
                'firstname' => 'Coder',
                'lastname' => 'Hybrid',
                'email' => 'hybridcoder@yenum.dev',
                'role_id' => 2,
                'email_verified_at' => now(),
                'password' => Hash::make('hybridcoder')
            ]);
            User::create([
                'username' => 'officialyenum',
                'firstname' => 'Yenum',
                'lastname' => 'Opone',
                'email' => 'oponechukwuyenum@gmail.com',
                'role_id' => 3,
                'email_verified_at' => now(),
                'password' => Hash::make('password')
            ]);


            User::create([
                'username' => 'johndoe',
                'firstname' => 'john',
                'lastname' => 'doe',
                'email' => 'john@doe.com',
                'phone' => '07064482201',
                'role_id' => 4,
                'email_verified_at' => now(),
                'password' => Hash::make('password')
            ]);
        }
    }
}
