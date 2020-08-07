<?php

namespace App\Http\Controllers\api\Group;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    public function show($id){
        return Group::find($id)->load('users','posts');

    }
}
