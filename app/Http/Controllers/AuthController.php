<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        validator(request()->all(), [
            "email" => ["required","email"],
            "password" => ["required"],
    
        ])->validate();
    
        if(auth()->attempt(\request()->only(["password","email"]))){
            return redirect("/");
        }
    
        return redirect()->back()->withErrors(["email" => "invalid"]);


    }

    public function register(Request $request)
    {
        validator(request()->all(), [
             "email" => ["required", "email","unique:users"],
             "password" => ["required", "min:8", "max:25"],
             "name" => ["required", "min:8", "max:25"],
        ])->validate();
       

       
        $name = $request->input("name");
        $password = $request->input("password");
        $email = $request->input("email");
        Db::table("users")->insert([
            ["email" => $email, "password" => Hash::make($password), "name" => $name, "isAdmin" => false]
            
        ]);
        return redirect(route("user.login"));
    }

    public function logout (Request $request)
    {
        $userId = $request ->input("id");

        Db::table("sessions")->where("user_id","=",$userId)->delete();
        return redirect()->back();
    }


}