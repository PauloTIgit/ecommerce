<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function loginUser( Request $request ){

        // Valida a entrada do usuário
        $validation = Validator::make($request->all(), [
            "email"=> "required|string|email|exists:users,email",
            "password"=> "required|string|min:6"
        ]);

        /// Email not present in DB
        if( $validation->fails() ){
            return response()->json(['status'=>400,'message'=>$validation->errors()->first()]);
        }else{
            $cred = array('email'=>$request->email,'password'=>$request->password);
            // Right Auth
            if (Auth::attempt($cred,false)) {
                if(Auth::User()->hasRole('admin')){
                    return response()->json(['status'=> 200,'message'=> 'Admin User','url'=>'admin/dashboard']);
                }else{
                    return response()->json(['status'=> 200,'message'=> 'Non User']);
                }
            }else{
                return response()->json(['status'=> 404,'message'=>"Wrong Cred"]);
            }   
        }

        
        // Retorna a resposta como JSON
        
    }

    public function creatUser( Request $request )
    {

        $validation = Validator::make($request->all(), [
            'name'      => "required|string",
            "email"     => "required|string|email|exists:users,email",
            "password"  => "required|string|min:6"
        ]);

        if( $validation->fails() ){
            return response()->json(['status'=>400,'message'=>$validation->errors()->first()]);
        }else{
            // Cria o novo usuário no banco de dados
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password); // Criptografa a senha
            $user->save();

            return response()->json(['status' => 200, 'message' => 'User created successfully']);
        }
    }
}
