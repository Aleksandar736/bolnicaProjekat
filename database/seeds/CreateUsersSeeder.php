<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'ime'=>'admin',
               'prezime'=>'admin',
               'email'=>'admin@admin.com',
               'username'=>'admin',
                'uloga'=>'admin',
               'password'=> bcrypt('admin123'),
            ],
            [
               'ime'=>'user',
               'prezime'=>'user',
               'email'=>'user@user.com',
               'username'=>'user',
                'uloga'=>'0',
               'password'=> bcrypt('user123'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
