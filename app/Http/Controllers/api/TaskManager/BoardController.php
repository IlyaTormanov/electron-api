<?php

namespace App\Http\Controllers\api\TaskManager;

use App\Board;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoardController extends Controller
{
    public function index(){
        return Board::all()->load('users');
    }

    public function show($id){
       return Board::find($id)->with('users','columns.tasks.users','columns.tasks.tags')->first();

    }

    public function userBoards($creator_id){

       return User::find($creator_id)->boards->load('users');


    }

    public function create(Request $request){
         $newBoard=Board::create($request->all());
            $newBoard->users()->attach(explode(',',$request->users));
    }


    public function update(Request $request,$id){
        $board=Board::find($id)->load('columns','users');
        $board->update($request->users,$request->id);
//        $board->columns()->save($request->input('columns')[0]);
        $board->save();

            dd($request->input()[0]);
//        return $board;
    }
    public function destroy($id){
        Board::find($id)->delete();
    }
}
