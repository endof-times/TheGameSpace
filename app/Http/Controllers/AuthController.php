<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AuthController extends Controller
{
    function register(){
        return view("auth.register");
    }

    function store(){
        $validated = request()->validate([
            "name"=>"required|min:3|max:16|unique:users,name",
            "email"=>"required|email|unique:users,email",
            "password"=>"required|confirmed|min:6|regex:'^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$'",
            "image"=>"nullable|image",
            "bio"=>"nullable|min:10|max:350"
        ]);

        $validated["password"] = Hash::make($validated["password"]);

        User::create($validated);

        if(auth()->attempt($validated)){
            return redirect()->route("home")->with("success", "User Created!");
        }else{
            return back()->withErrors(["email", "Can't login. Try again"]);
        };



    }

    function login(){
        return view("auth.login");
    }

    function authenticate(){
        $validated = request()->validate([
            "email" => "email",
            "password" => "required"
        ]);

        if(auth()->attempt($validated)){
            return redirect()->route("home")->with("Success", "Logged in!");
        }else{
            return back()->withErrors(["email" => "Wrong email or password"]);
        }
    }

    function logout(){
        auth()->logout();

        return redirect()->route("home")->with("deleted", "Logged Out!");
    }

    function show(User $id){
        return view("auth.profile", ["user" => $id]);
    }
}
