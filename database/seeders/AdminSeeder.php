<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::query()->create([
            "access" =>0,
            "register_form" =>0,
            'email'=>'amirhmh@gmail.com',
            "password"=>bcrypt('123456')
        ]);

        $user->assignRole('admin');

    }
}
