<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use Validator;

class ProfileController extends Controller
{
    public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Profile::all();
        
        return response()->json(['Perfiles' => $profile->toArray()], $this->successStatus);
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
            'name'=>'required',
        ]);
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);       
        }
        $profile = Profile::create($input);
        return response()->json(['Perfil' => $profile->toArray()], $this->successStatus);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        $profile = Profile::find($profile->id);

        if (is_null($profile)) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        return response()->json(['Perfil' => $profile->toArray()], $this->successStatus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
         $input = $request->all();

        $validator = Validator::make($input, [
            'name'=>'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);       
        }

        $profile->name= $input['name'];
        $profile->save();

        return response()->json(['Perfil' => $profile->toArray()], $this->successStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();

        return response()->json(['Perfil' => $profile->toArray()], $this->successStatus);
    }
}
