<?php

namespace App\Http\Controllers;

use App\rating;
use Illuminate\Http\Request;
use App\student;
use App\course;

class RatingController extends Controller
{

    // get
    // http://127.0.0.1:8000/api/ratings
    public function index()
    {
        return Rating::all();
    }


    // post
    // http://127.0.0.1:8000/api/ratings
    public function store(Request $request)
    {
        $request->validate([
            "rate" => "required|max:11|numeric"
        ]);

        $ratings = Rating::create($request->all());

        $response = [
            "ratings" =>$ratings,
            "message" =>"Insert Done",
        ];

        return response($response, 201);
    }


    // get
    // http://127.0.0.1:8000/api/ratings/1
    public function show($id)
    {
        return Rating::find($id);
    }


    // put
    // http://127.0.0.1:8000/api/ratings/1
    public function update(Request $request,$id)
    {
        $request->validate([
            "rate" => "required|max:11|numeric"
        ]);

        $target_rating = Rating::find($id);
        $target_rating->update($request->all());

        $response = [
            "ratings" => $target_rating,
            "message" =>"Update Done",
        ];
        return response($request, 201);
    }


    // delete
    // http://127.0.0.1:8000/api/ratings/1
    public function destroy($id)
    {
        return Rating::destroy($id);
    }
}
