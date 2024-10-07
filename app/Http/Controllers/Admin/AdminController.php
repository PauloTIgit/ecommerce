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
      $user->name   =  'Paulo Ferreira';
      $user->email   =  'pauloferreiradevs@gmail.com';
      $user->password = Hash::make('19012001');
      $user->save();
 
      $admin = Role::where('slug','admin')->first();
 
      $user->roles()->attach($admin);
    }
   
}

