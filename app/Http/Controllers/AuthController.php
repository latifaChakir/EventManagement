<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function login(){
        return view('auth.login');
    }
    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required',
        ],[
            'name.required' => 'Le champ nom est important',
            'email.required' => 'Le champ email est important',
            'email.email' => 'Veuillez entrer une adresse email valide',
            'email.unique' => 'Cet email est déjà pris',
            'password.required' => 'Le champ mot de passe est important',
        ]);

        $user=new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/login');
    }

}
