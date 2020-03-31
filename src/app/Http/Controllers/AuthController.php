<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ]))
            return redirect('/');
        else
            return back()->with('status', 'Incorrect data');
    }

    public function register(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required'
        ]);

        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));
        $user->save();

        return redirect()->route('login');
    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }
}
