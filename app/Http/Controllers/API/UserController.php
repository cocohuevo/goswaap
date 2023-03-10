<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Task;
use Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json(['Usuarios' => $users->toArray()], $this->successStatus);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'firstname' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'type' => 'required',
            'password' => 'required',
            'boscoins' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'assessment' => 'required',
            'task_id' => 'required',
            
        ]);
        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);       
        }
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        return response()->json(['Usuario' => $user->toArray()], $this->successStatus);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = Task::find($user->id);

        if (is_null($user)) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        return response()->json(['Usurio' => $user->toArray()], $this->successStatus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'firstname' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'type' => 'required',
            'password' => 'required',
            'boscoins' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'assessment' => 'required',
            'task_id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);       
        }

        $user->firstname= $input['firstname'];
        $user->surname = $input['surname'];
        $user->email = $input['email'];
        $user->type = $input['type'];
        $user->password = $input['password'];   
        $user->boscoins= $input['boscoins'];
        $user->address = $input['address'];
        $user->mobile = $input['mobile'];
        $user->assessment = $input['assessment'];
        $user->task_id = $input['task_id'];   
        $user['password'] = bcrypt($user['password']);
        $user->save();

        return response()->json(['Usuario' => $user->toArray()], $this->successStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['Usuario' => $user->toArray()], $this->successStatus);
    }
}
