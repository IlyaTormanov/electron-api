<?php

namespace App\Http\Controllers\api\TaskManager;

use App\Board;
use App\Column;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColumnController extends Controller
{

    public function boardColumns($board_id){
        return Board::find($board_id)->columns->load('tasks');
    }
    public function show($id){
        return Column::find($id)->load('tasks');
    }
    public function create(Request $request){
        return Column::create($request->all());
    }
    public function update($id,Request $request){
        return Column::find($id)->update($request->all());
    }


}
