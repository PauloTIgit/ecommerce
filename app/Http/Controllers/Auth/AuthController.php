<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function loginUser( Request $request ){
        // Valida a entrada do usuário
        $validatedData = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string|min:6'
        ]);
        // Adiciona status à resposta
        $response = [
            'status' => 200,
            'email' => $validatedData['email'],
            'password' => $validatedData['password']
        ];
        // Retorna a resposta como JSON
        return response()->json($response);
    }
}
