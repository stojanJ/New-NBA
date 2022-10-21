<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }
    
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        $success = auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ]);

        if ($success) {
            if(auth()->user()->is_verified){
                 return redirect('/');
                }else{
                    $this->destroy();
                return back()->withErrors([
                    'message' => 'You are not verified'
                ]);
                }
        } else {
            return back()->withErrors([
                'message' => 'Please check you credentials.'
            ]);
        }
        
        if (!auth()->user()->is_verified) {
            auth()->logout();
            return back()->with('message', 'You need to confirm your account. We have sent you an activation code, please check your email.');
        } 
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('auth.login');
    }
}
