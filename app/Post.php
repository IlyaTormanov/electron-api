<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $hidden=['pivot'];
    protected $fillable=['title','body','ps'];
    public function group(){
        return $this->belongsTo(Group::class );
    }


    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function comments(){
        return $this->belongsTo(Comment::class);
    }
}
