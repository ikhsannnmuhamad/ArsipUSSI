<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserData extends Seeder
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
                'user_id' => '4',
                'name' => 'qwe',
                'level' => '1',
                'email' => 'qwe@gmail.com',
                'password' => bcrypt('qwe'),
                'remember_token' => Str::random(60),
            ]
        ];
        foreach($user as $key =>$value){
            User::create($value);
        }
    }
}
