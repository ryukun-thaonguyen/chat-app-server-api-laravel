<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PharIo\Manifest\Author;
use Tymon\JWTAuth\Contracts\Providers\Auth as ProvidersAuth;

class UserController extends Controller
{
    //
    public function login(Request $req){
       Auth::attempt(['email' => $req->email, 'password' => $req->password]);
       $user=Auth::user();
       Auth::logout();
       return response()->json($user,200);
    }
}
