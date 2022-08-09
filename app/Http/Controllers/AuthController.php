<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use App\admin;

class AuthController extends Controller
{
    //register post
    //http://127.0.0.1:8000/api/register
    public function register(Request $request){
        $fileds = $request->validate([
            "name" => "required|max:200",
            "phone" => "required|max:50",
            "email" => "required|unique:admins|max:200",
            "password" => "confirmed|required|max:50",
            "image" => "required|max:200",
            "role" => "required|max:11|numeric"
        ]);
        $admins = Admin::create([
            "name" =>$fileds['name'],
            "phone" =>$fileds['phone'],
            "email" =>$fileds['email'],
            "password" =>bcrypt($fileds['password']),
            "image" =>$fileds['image'],
            "role" =>$fileds['role'],
        ]);
        $token = $admins->createToken("Tokenn")->plainTextToken;

        $response = [
            "admins" =>$admins,
            "Tokenn" =>$token
        ];
        return response($response,201);
    }

    //login post
    //http://127.0.0.1:8000/api/login
    public function login(Request $request){
        $fileds = $request->validate([
            "email" => "required|string",
            "password" => "required|string"
        ]);
        $admins = Admin::where("email","=",$fileds['email'])->first();
        if(!$admins || !Hash::check($fileds['password'], $admins->password)){
            return response([
                "message" => "Wrong Password || Email"
            ],401);
        }
        $token = $admins->createToken("Tokenn")->plainTextToken;

        $response = [
            "admins" =>$admins,
            "Tokenn" =>$token
        ];
        return response($response,201);
    }


    //logout post
    //http://127.0.0.1:8000/api/logout
    public function logout(Request $request){
        auth()->admin()->tokens()->delete();
        return [
            "message" => "Logout Done"
        ];
    }
}
