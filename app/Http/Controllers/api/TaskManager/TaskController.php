<?php

namespace App\Http\Controllers\api\TaskManager;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
        public function create(Request $request){
        $newTask=Task::create($request->all());
            $newTask->users()->attach(explode(',',$request->users));
            $newTask->total_users=count($newTask->users);
            $newTask->save();
            return $newTask->load('users','tags');
        }

        public function show($id){
            return Task::find($id)->load('users','tags','comments');
        }
}
