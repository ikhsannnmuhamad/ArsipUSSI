<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\post;

class UserLevel extends Seeder
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
                'level_id' => '2',
                'level' => 'User',
                'remember_token' => Str::random(60),
            ]
        ];
        foreach($user as $key =>$value){
            Post::create($value);
        }
    }
}
