<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // funcion del registro

    public function registro(Request $request){
        $this->validate($request, [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|max:20|confirmed',
        ]);

        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password); //para que encripte la contraseña
        if ($usuario->save()) {
            $token = $usuario->createToken('Personal Token')->plainTextToken;
            return response()->json([
                'mensaje' => 'Usuario creado con exito',
                'usuario' => $usuario,
                'token' => $token
            ]);
        } else {
            return response()->json(['error' => 'No se pudo registrar el usuario'], 400);
        }
    }

    // funcion para login

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string|min:8|max:20',
        ]);

        $credenciales = request(["email", "password"]);
        if(!Auth::attempt($credenciales)){
            return response()->json(["mensaje" => "Usuario o contraseña no validos, intente nuevamente"], 401);
        }
        $usuario = $request->user();
        $token = $usuario->createToken('Personal token')->plainTextToken;

        return response()->json([
            'mensaje' => 'Login exitoso',
            'usuario' => $usuario,
            'token' => $token
        ]);
    }
}
