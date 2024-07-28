<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function registerForm()
    {
        return view('posts.register');
    }
    public function register (Request $request)
    {
        $data = $request->all();
        $validator = Validator:: make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $validator->validate();
        
        $user = User::create([
            "name" => $data["nama"],
            "email" => $data["email"],
            "password" => Hash:: make($data['password'])
        ]);
        auth()->login($user);
        return redirect()->route("home");
    }
    //publiv function index ()
    // {
    //   $user = auth()->user();
    //   return view("posts.index", compact('user'));
    //}

    public function loginform()
    {
        return view("posts.login");
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password'); 
        $remember = $request->has('remember');
        
        $validator = Validator:: make($credentials, [ 
            'email' => [ 'required', 'string', 'email'], 
            'password' => ['required', 'string'],
        ]);
        
        $validator->validate();
        
        if (auth()->attempt($credentials, $remember)) {
            // Authentication passed... 
            return redirect()->intended('/home');
        }

        return redirect()->back()
        ->withErrors(['email' => 'The provided credentials do not match our records.'])
        ->withInput
}
public function logout()
{
    auth()->logout();
    return redirect()->route("login")
}
    }
 

