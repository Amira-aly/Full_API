<?php

namespace App\Http\Controllers;

use App\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{

    // get
    // http://127.0.0.1:8000/api/students
    public function index()
    {
        return Student::all();
    }


    // post
    // http://127.0.0.1:8000/api/students
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:200",
            "email" => "required|email|unique:students|max:250",
            "phone" => "required|max:22",
            "collage" => "required|max:22",
            "password" => "confirmed|required|max:50",
            "image" => "required|max:230",
        ]);

        $data = $request->all();
        $data['password']     = Hash::make($request->password);
        $students = Student::create($data);

        $response = [
            "students" =>$students,
            "message" =>"Insert Done",
        ];

        return response($response, 201);
    }


    // get
    // http://127.0.0.1:8000/api/students/1
    public function show($id)
    {
        return Student::find($id);
    }



    // put
    // http://127.0.0.1:8000/api/students/1
    public function update(Request $request,$id)
    {
        $request->validate([
            "name" => "required|max:200",
            "email" => "required|email|unique:students|max:250",
            "phone" => "required|max:22",
            "collage" => "required|max:22",
            "password" => "confirmed|required|max:50",
            "image" => "required|max:230",
        ]);


        $target_student = Student::find($id);
        $data = $request->all();
        $data['password']     = Hash::make($request->password);
        $target_student->update($data);
        $response = [
            "students" =>$target_student,
            "message" =>"Update Done",
        ];
        return response($request, 201);
    }


    // delete
    // http://127.0.0.1:8000/api/students/1
    public function destroy($id)
    {
        return Student::destroy($id);
    }
}
