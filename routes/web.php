<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\homeBannerController;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
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


// Route::get('/', function () {
//     return view('home/ecommerce');
// });

Route::get('/', function () {
    return redirect('admin/dashboard');
});

Route::get('/version', function () {
    return view('welcome');
});

Route::get("/painel", function () {
    return redirect('admin/dashboard');
});

Route::get('/entrar', function () {
    return view('auth/signIn');
});

Route::get('/sair', function () {
    Auth::logout();
    return redirect('entrar');
});

Route::get('/cadastre-se', function () {
    return view('auth/signUp');
});


Route::post('/login_user', [AuthController::class,'loginUser']);
Route::post('/creat_user', function () {
    return redirect('admin/dashboard');
});

// Route::get('/creat_user', [AdminController::class, 'createCustomer']);


