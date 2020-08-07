<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder;

class Board extends Model
{
    public $timestamps = false;

    protected $hidden = ['pivot'];


    protected $fillable = ['name', 'creator_id', 'columns'];

    public function filters(Builder $builder, QueryFilter $filters)
    {
        return $filters->apply($builder);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'board_user');
    }

    public function columns()
    {
        return $this->hasMany(Column::class);
    }
}
