<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $hidden=['pivot'];
    protected $fillable=['name'];

    public function posts(){
        return $this->belongsToMany(Post::class);
    }

    public function tasks(){
        return $this->belongsToMany(Task::class);
    }
}
