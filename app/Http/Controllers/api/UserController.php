<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all()->load('boards','groups');
    }



    public function show($id)
    {
        return User::find($id)->load('boards','groups');
    }
}
