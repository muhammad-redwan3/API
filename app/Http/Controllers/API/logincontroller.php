<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\http\Resources\User as UserResource;


class logincontroller extends Controller
{
    /**
     * a new controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.basic.once');
    }

    public function login()
    {
        $Aceesstoken = Auth::user()->createToken('Access Token')->accessToken;

        return Response(['user' => new UserResource(Auth::user()), 'Access Token' => $Aceesstoken]);
    }
}
