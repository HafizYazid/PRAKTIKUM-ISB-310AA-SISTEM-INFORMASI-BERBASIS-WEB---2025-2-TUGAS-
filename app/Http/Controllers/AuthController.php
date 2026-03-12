<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class AuthController extends Controller
{
    public function showLogin(){
        if (session()->has('user')) {
            return redirect()->route('index');
        }
        return view('login');
    }

    public function login(Request $request){
        $valid_user = "admin";
        $valid_pass = "123";

        if ($request-> username == $valid_user && $request->password === $valid_pass) {
            session(['user' => $request->username]);
            return redirect()->route('index');
        } else {
            return back()->withErrors(['message' => 'Invalid username or password']);
        }   
    }

    public function logout(){
        session()->forget('user');
        return redirect()->route('login');
    }

    public function index(){
        if (!session()->has('user')) {
            return redirect()->route('login');
        }
        return view('index');
    }
}
