<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        User::create($input);
        return response()->json([
            'res' => true,
            'message' => 'Usuario Creado Correctamente'
        ], 200);
    }

    public function login(Request $request)
    {
        $user = User::whereEmail($request->email)->first();
        if(!is_null($user) && Hash::check($request->password, $user->password)){

            $token = $user->createToken('APIproyecto')->accessToken;

            return response()->json([
                'res' => true,
                'token' => $token,
                'message' => 'Bienvenido'
            ],  200);

        }
        else{
            return response()->json([
                'res' => false,
                'message' => 'Cuenta o Contraseña Incorrecto'
            ],  200);
        }
    }

    public function logout (){

        $user = auth()->user();
        //inicio de comandos para eliminar todos los tokes del usuario que finalizara sesion
        $user->tokens->each(function ($token, $key){
            $token->delete();
        });
        $user->save();
        //fin del codigo

        //otra forma de hacerlo pero revocando el token del dispositivo donde
        //realizo logout y no todos los relacionados al usuario
        /*
        $user = auth()->user();
        $user->token()->revoke();
        */

        return response()->json([
            'res' => false,
            'message' => 'Sesion Terminada'
        ],  200);

    }
}
