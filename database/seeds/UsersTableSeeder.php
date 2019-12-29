<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();
        $adminRole=Role::where('type',"1")->first();
        $userRole=Role::where('type',"2")->first();
        $admin=User::create([
            "name"=>"Mohammed Admin",
            "email"=>"m7.jalal@gmail.com",
            "phone"=>"0788975120",
            "password"=>Hash::make("123123123")
        ]);
        $user=User::create([
            "name"=>"Mohammed User",
            "email"=>"m7.jalal91@gmail.com",
            "phone"=>"0779674045",
            "password"=>Hash::make("123123123")
        ]);
        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
    }
}
