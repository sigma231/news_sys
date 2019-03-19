<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\business;

class businessController extends Controller
{
    //
    public function createBusinessNews(Request $request){
        $user = $request->user;
        $validatedData = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'data' => 'required',
        ]);
        $business = new business([
            'user_id' => $user->id,
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'data' => $request->input('data'),

         ]);
        $business->save();
        return response([
            'status' => 'success',
            'data' => 'successfully created'
        ]);

    }
    public function retrieveBusinessNews(Request $request){
        $business = new business;
        $business_data = $business::all();
        return response([
            'status' => 'success',
            'data' => $business_data
        ]);
    }

    public function deleteBusinessNews(Request $request){
        $validatedData = $request->validate([
            'business_record_id' => 'required'
        ]);
        $business = business::find($request->input('business_record_id'));
        $business->delete();


    }
}
