<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;

class AdminController extends Controller
{
    public function createCustomer()
    {
      $user         =  new User();
      $user->name   =  'User Teste';
      $user->email   =  'user_teste@gmail.com';
      $user->password = Hash::make('12345678');
      $user->image = 'images/avatars/perfilDefaut.jpg';
      $user->save();
 
      $admin = Role::where('slug','admin')->first();
 
      $user->roles()->attach($admin);
    }
   
}

