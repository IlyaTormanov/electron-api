<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $hidden=['pivot'];
    public $timestamps=false;
    protected  $fillable=[
        'author_id','name','target','status','description','column_id','priorityStatus'
    ];

    public function column(){
        return $this->belongsTo(Column::class);
    }
    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function comments(){
        return $this->belongsTo(Comment::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
