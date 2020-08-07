<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['content'];
    public function post(){
        return $this->hasMany(Post::class);
    }

    public function task(){
        return $this->hasMany(Task::class);
    }


}
