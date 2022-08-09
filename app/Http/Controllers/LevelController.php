<?php

namespace App\Http\Controllers;

use App\level;
use Illuminate\Http\Request;

class LevelController extends Controller
{

    // get
    // http://127.0.0.1:8000/api/levels
    public function index()
    {
        return Level::all();
    }


    // post
    // http://127.0.0.1:8000/api/levels
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|max:200"
        ]);

        $data = $request->all();
        $levels = Level::create($data);

        $response = [
            "levels" =>$levels,
            "message" =>"Insert Done",
        ];

        return response($response, 201);
    }


    // get
    // http://127.0.0.1:8000/api/levels/1
    public function show($id)
    {
        return Level::find($id);
    }


    // put
    // http://127.0.0.1:8000/api/levels/1
    public function update(Request $request, $id)
    {
        $request->validate([
            "title" => "required|max:200"
        ]);

        $target_level = Level::find($id);
        $target_level->update($request->all());
        $response = [
            "levels" =>$target_level,
            "message" =>"Update Done",
        ];
        return response($request, 201);
    }


    // delete
    // http://127.0.0.1:8000/api/levels/1
    public function destroy($id)
    {
        return Level::destroy($id);
    }
}
