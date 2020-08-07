<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable=['name','status','description','total_users','total_posts','direction'];
    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
