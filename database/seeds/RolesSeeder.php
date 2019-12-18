<?php
use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('name', '=', 'Admin')->first() ?
            Role::where('name', '=', 'Admin')->first() :
            Role::create(['name' => 'Admin']);

        $editor = Role::where('name', '=', 'Editor')->first() ?
            Role::where('name', '=', 'editor')->first() :
            Role::create(['name' => 'editor']);

        $writter = Role::where('name', '=', 'Writter')->first() ?
            Role::where('name', '=', 'writter')->first() :
            Role::create(['name' => 'writter']);

        $host = Role::where('name', '=', 'Host')->first() ?
            Role::where('name', '=', 'Candidat')->first() :
            Role::create(['name' => 'Candidat']);



    }
}
