<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui é onde você pode registrar rotas da web para sua aplicação. Esses
| rotas são carregadas pelo RouteServiceProvider e todas elas serão
| atribuídas ao grupo de middleware "web". Faça algo ótimo!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/painel', function () {
    return view('admin/index');
});

Route::get('/entrar', function () {
    return view('auth/signIn');
});

Route::get('/cadastre-se', function () {
    return view('auth/signUp');
});

Route::post('/login_user', [AuthController::class,'loginUser']);
Route::post('/creat_user', [AuthController::class, 'creatUser']);
