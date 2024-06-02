<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class ClientController extends Controller
{
    public function create($name, $email, $password, $slug)
    {
        $user         =  new User();
        $user->name   =  $name;
        $user->email   = $email;
        $user->password = Hash::make($password);
        $user->save();

        $admin = Role::where('slug', $slug)->first();

        $user->roles()->attach($admin);
    }
}
