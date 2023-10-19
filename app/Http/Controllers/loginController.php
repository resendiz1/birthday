<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class loginController extends Controller
{
    public function login(){

        return view('login.login');

    }

    public function login_entrar(){
        return request()->only(['email','password']);
    }


}
