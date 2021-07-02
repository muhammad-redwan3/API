<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\http\Resources\User as UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\onceBasic;


class UserController extends Controller
{
    /**
     * a new controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = UserResource::collection(User::all());
        return $user->response()->setStatusCode(200);
        //     ->header('Additional Header', 'True');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new UserResource(User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]));
        return $user->response()->setStatusCode(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = new UserResource(User::find($id));
        return $user->response()->setStatusCode(200, "user Returned Succefully")
            ->header('Additional Header', 'True');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response 
     */
    public function update(Request $request, $id)
    {
        $User = new UserResource(User::findOrFail($id));
        $User->update($request->all());
        return $User->response()->setStatusCode(200, "User UPdated Succefully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::findOrFail($id);
        $User->delete();
        return 204;
    }
}
