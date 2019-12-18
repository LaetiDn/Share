<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Traits\HasRoles;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::where('email', 'laetitia@ctrlweb.ca')->first();

        if (!$user) {
            User::create([
                'id'        => 1,
                'name'      => 'Laeti Dn',
                'username'  => 'Laeti',
                'email'     => 'laetitia@ctrlweb.ca',
                'password'  => Hash::make('password'),
                ]
            );
        }
        $user->assignRole('Admin');
        $user->save();
    }
}
