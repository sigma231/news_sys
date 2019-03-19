<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\entertainment;

class entertainmentController extends Controller
{
    //
    public function createEntertainmentNews(Request $request){
        $user = $request->user;
        $validatedData = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'data' => 'required',
        ]);
        $entertainment = new entertainment([
            'user_id' => $user->id,
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'data' => $request->input('data'),

         ]);
        $entertainment->save();
        return response([
            'status' => 'success',
            'data' => 'successfully created'
        ]);

    }
    public function retrieveEntertainmentNews(Request $request){
        $entertainment = new entertainment;
        $entertainment_data = $entertainment::all();
        return response([
            'status' => 'success',
            'data' => $entertainment_data
        ]);
    }

    public function deleteEntertainmentNews(Request $request){
        $validatedData = $request->validate([
            'entertainment_record_id' => 'required'
        ]);
        $entertainment = entertainment::find($request->input('entertainment_record_id'));
        $entertainment->delete();


    }
}
