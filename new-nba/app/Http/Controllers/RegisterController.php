<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatUserRequest;
use App\Models\User;
use App\Mail\VerificationEmail;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create(){
        return view('auth.register');
    }

    public function store(CreatUserRequest $request){

        $validated = $request->validated();

        $user = new User();

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->token = str_random(40);
        $user->save();
        
        Mail::to($user->email)->send(new VerificationEmail($user));

        session()->flash('message', 'Registration is successful');
        
        return redirect('/login')->with('message', 'Visit email to confirm account');
    }

    public function verify(User $user, $token){

        if($token === $user->token) {
            $user->update([
                'is_verified' => 1,
                'token' => null
            ]);
            auth()->login($user);
            return redirect('/')->with('success', 'Account is confirmed');
        }

        return redirect('/login')->with('message', 'Visit email to confirm account');
    }
}
