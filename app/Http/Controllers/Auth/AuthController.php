<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginUser( Request $request ){

        $validation = Validador::make($request->all(),[
            'email'=>'required|string',
            'password'=> 'required|string|min:6'
        ]);

        print_r($validation->fails()); die();
    }
}
