<?php

namespace App\Http\Controllers;

use App\tracke;
use Illuminate\Http\Request;

class TrackeController extends Controller
{

    // get
    // http://127.0.0.1:8000/api/trackes
    public function index()
    {
        return Tracke::all();
    }


    // post
    // http://127.0.0.1:8000/api/trackes
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|max:200",
            "desciption" => "required|max:250"
        ]);

        $data = $request->all();
        $trackes = Tracke::create($data);

        $response = [
            "trackes" =>$trackes,
            "message" =>"Insert Done",
        ];

        return response($response, 201);
    }


    // get
    // http://127.0.0.1:8000/api/trackes/1
    public function show($id)
    {
        return Tracke::find($id);
    }


    // put
    // http://127.0.0.1:8000/api/trackes/1
    public function update(Request $request, $id)
    {
        $request->validate([
            "title" => "required|max:200",
            "desciption" => "required|max:250"
        ]);

        $target_tracke = Tracke::find($id);
        $target_tracke->update($request->all());

        $response = [
            "trackes" =>$target_tracke,
            "message" =>"Update Done",
        ];
        return response($response, 201);
    }

    // delete
    // http://127.0.0.1:8000/api/trackes/1
    public function destroy($id)
    {
        $trackes = Tracke::find($id);
        $trackes->delete();
    }
}
