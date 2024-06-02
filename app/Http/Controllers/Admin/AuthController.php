<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
 

class AuthController extends Controller
{
    public function createCustomer()
    {
      $user         =  new User();
      $user->name   =  'Admin';
      $user->email   =  'admin@gmail.com';
      $user->password = Hash::make('1234');
      $user->save();
 
      $admin = Role::where('slug','admin')->first();
 
      $user->roles()->attach($admin);
    }
   
}

