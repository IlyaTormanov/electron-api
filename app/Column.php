<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    public $timestamps=false;
    protected $fillable=[
        'name','board_id','total'
    ];


    public function tasks(){
        return $this->hasMany(Task::class);
    }
    public function board(){
        return $this->belongsTo(Board::class);
    }

}
