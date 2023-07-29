<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LandingPageController extends Controller
{
    public function index(){
        return view('landing-page.index');
    }
    public function login(){
        if(Auth::user()){
            return redirect('/dashboard');
        }
        return view('landing-page.login');
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
