<?php

namespace App\Http\Controllers;

use App\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    // get
    // http://127.0.0.1:8000/api/admins
    public function index()
    {
        return Admin::all();
    }


    // post
    // http://127.0.0.1:8000/api/admins
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:200",
            "phone" => "required|max:50",
            "email" => "required|unique:admins|max:200",
            "password" => "confirmed|required|max:50",
            "image" => "required|max:200",
            "role" => "required|max:11|numeric"
        ]);

        $data = $request->all();
        $data['password']     = Hash::make($request->password);
        $admins = Admin::create($data);

        $response = [
            "admins" =>$admins,
            "message" =>"Insert Done",
        ];

        return response($response, 201);
    }


    // get
    // http://127.0.0.1:8000/api/admins/1
    public function show($id)
    {
        return Admin::find($id);
    }


    // put
    // http://127.0.0.1:8000/api/admins/1
    public function update(Request $request,$id)
    {
        $request->validate([
            "name" => "required|max:200",
            "phone" => "required|max:50",
            "email" => "required|unique:admins|max:200",
            "password" => "confirmed|required|max:50",
            "image" => "required|max:200",
            "role" => "required|max:11|numeric"
        ]);

        $target_admin = Admin::find($id);
        $data = $request->all();
        $data['password']     = Hash::make($request->password);
        $target_admin->update($data);
        $response = [
            "admins" =>$target_admin,
            "message" =>"Update Done",
        ];
        return response($request, 201);
    }


    // delete
    // http://127.0.0.1:8000/api/admins/1
    public function destroy($id)
    {
        return Admin::destroy($id);
    }
}
