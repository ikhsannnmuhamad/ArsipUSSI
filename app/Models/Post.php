<?php

namespace App\Models;

use App\Models\user;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class post extends Model
{
    use HasFactory;
    protected $table = "level";
    protected $guarded = [];

    public function satu(){
        return $this->hasMany(Post::class, 'level_id', 'level');
    }
}
