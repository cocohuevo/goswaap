<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Task;
use Validator;

class TaskController extends Controller { 
    public $successStatus = 200;

    public function index() {
        $tasks = Task::all();
        
        return response()->json(['Tareas' => $tasks->toArray()], $this->successStatus);
    }

    public function store(Request $request) {
        $input = $request->all();
        $validator = Validator::make($input, [
            'num_boscoins'=>'required',
            'description'=>'required',
            'date_request'=>'required',
            'date_completian'=>'required',
            'type'=>'required',
            'user_id'=>'required',
            'profile_id'=>'required',
        ]);
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);       
        }
        $task = Task::create($input);
        return response()->json(['Tarea' => $task->toArray()], $this->successStatus);
    }

    public function show($task) {
        $task = Task::find($task->id);

        if (is_null($task)) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        return response()->json(['Tarea' => $task->toArray()], $this->successStatus);
    }

    public function update(Request $request, Task $task) {
        $input = $request->all();

        $validator = Validator::make($input, [
            'num_boscoins'=>'required',
            'description'=>'required',
            'date_request'=>'required',
            'date_completian'=>'required',
            'type'=>'required',
            'user_id'=>'required',
            'profile_id'=>'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);       
        }

        $task->num_boscoins= $input['num_boscoins'];
        $task->description = $input['description'];
        $task->date_request = $input['date_request'];
        $task->date_completian = $input['date_completian'];
        $task->type = $input['type'];
        $task->type = $input['user_id'];
        $task->type = $input['profile_id'];

        $task->save();

        return response()->json(['Tarea' => $task->toArray()], $this->successStatus);
    }

    public function destroy(Task $task) {
        $task->delete();

        return response()->json(['Tarea' => $task->toArray()], $this->successStatus);
    }
}
