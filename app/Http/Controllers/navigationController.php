<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class navigationController extends Controller
{
    //
    public function createNavigationNews(Request $request){
        $user = $request->user;
        $validatedData = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'data' => 'required',
        ]);
        $navigation = new navigation([
            'user_id' => $user->id,
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'data' => $request->input('data'),

         ]);
        $navigation->save();
        return response([
            'status' => 'success',
            'data' => 'successfully created'
        ]);

    }
    public function retrieveNavigationNews(Request $request){
        $navigation = new navigation;
        $navigation_data = $navigation::all();
        return response([
            'status' => 'success',
            'data' => $navigation_data
        ]);
    }

    public function deleteNavigationNews(Request $request){
        $validatedData = $request->validate([
            'navigation_record_id' => 'required'
        ]);
        $navigation = navigation::find($request->input('navigation_record_id'));
        $navigation->delete();


    }
}
