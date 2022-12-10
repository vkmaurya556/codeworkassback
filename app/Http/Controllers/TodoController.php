<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //
    function add(Request $request)
    {
        if ($request->id == 0) {
            $todo = new Todo;
        } else {
            $todo = Todo::find($request->id);
        }
        $todo->todo = $request->todo;
        $todo->save();
        $id = $todo->id;

        return ["status" => true, "message" => "Todo Added Successfully", "todo" => $todo];
    }
    function delete(Request $request)
    {
        $todo = Todo::find($request->id);
        if (!empty($todo))
            $todo->delete();
        return ["status" => true, "message" => "Todo Deleted Successfully"];
    }
    function display()
    {
        $todo = Todo::orderBy('id', 'DESC')->get()->toArray();
        if (count($todo)) {
            return ["status" => true, "message" => "Todo Added Successfully", "data" => $todo];
        } else
            return ["status" => false, "message" => "Todo Added Successfully"];
    }
}
