<?php

namespace App\Http\Controllers;

use App\course;
use Illuminate\Http\Request;
use App\admin;
use App\tracke;
use App\level;

class CourseController extends Controller
{

    // get
    // http://127.0.0.1:8000/api/courses
    public function index()
    {
        return Course::all();
    }


    // post
    // http://127.0.0.1:8000/api/courses
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:200",
            "link" => "required|max:250",
            "image" => "required|max:122"
        ]);

        $courses = Course::create($request->all());

        $response = [
            "courses" =>$courses,
            "message" =>"Insert Done",
        ];

        return response($response, 201);
    }


    // get
    // http://127.0.0.1:8000/api/courses/1
    public function show($id)
    {
        return Course::find($id);
    }


    // put
    // http://127.0.0.1:8000/api/courses/1
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|max:200",
            "link" => "required|max:250",
            "image" => "required|max:122"
        ]);

        $target_course = Course::find($id);
        $target_course->update($request->all());
        $response = [
            "courses" =>$target_course,
            "message" =>"Update Done",
        ];
        return response($request, 201);
    }


    // delete
    // http://127.0.0.1:8000/api/courses/1
    public function destroy($id)
    {
        return Course::destroy($id);
    }
}
