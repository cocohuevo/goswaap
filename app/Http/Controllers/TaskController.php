<?php

namespace App\Http\Controllers;

use App\User;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(User $user)
    {
        $task = Task::with('user.id')->get();
        return view('task.index', compact('task'));
    }

    public function create(User $user)
    {
        $user = User::orderBy('firstname')->get();
        return view('task.create', compact('user'));
    }

    public function store(Request $request, User $user)
    {
        $task = new Task();
        $task->task = $request->input('task');
        $task->user_id = $user->id;
        $task->save();
        return 'Salvado';
    }

    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
