<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class RegisterController extends Controller {
    public $successStatus = 200;

    public function register(Request $request) {
       
        $validator = Validator::make($request->all(), [
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

        $input = $request->all();
       
        $input['password'] = bcrypt($input['password']);

        
        $user = User::create($input);

        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['firstname'] =  $user->firstname;

        return response()->json(['success' => $success], $this->successStatus);
    }
    public function login() {
        // Si las credenciales son correctas
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            // Creamos un token de acceso para ese usuario
            $success['token'] = $user->createToken('MyApp')->accessToken;

            // Y lo devolvemos en el objeto 'json'
            return response()->json(['success' => $success], $this->successStatus);
        }
        else {
            return response()->json(['error' => 'No estás autorizado'], 401);
        }
}

}

