<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    //Metodo login
     public function login(Request $request){
         $creds = $request->only(['email', 'password']);

         if(!$token=auth()->attempt($creds)){
             return response()->json([
                 'success' => false
             ]);

             return response()->json(['error' => 'Unauthorized'], 401);
         }
         return response()->json([
             'success' => true,
             'token' => $token,
             'user' => Auth::user()
         ]);
     } 

/*
     public function register(Request $request) {
        
    }
*/


     //Metodo logout
     public function logout() {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    //Metdo para crear un nuevo token
     public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    //Metodo que devuelve la informacion del usuario logeado (gracias al middleware del principio)
    public function userProfile() {
        return response()->json(auth()->user());
    }

     


}
