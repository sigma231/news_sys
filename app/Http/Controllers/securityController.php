<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class securityController extends Controller
{
    //
    public function createSecurityNews(Request $request){
        $user = $request->user;
        $validatedData = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'data' => 'required',
        ]);
        $security = new security([
            'user_id' => $user->id,
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'data' => $request->input('data'),

         ]);
        $security->save();
        return response([
            'status' => 'success',
            'data' => 'successfully created'
        ]);

    }
    public function retrieveSecurityNews(Request $request){
        $security = new security;
        $security_data = $security::all();
        return response([
            'status' => 'success',
            'data' => $security_data
        ]);
    }

    public function deleteSecurityNews(Request $request){
        $validatedData = $request->validate([
            'security_record_id' => 'required'
        ]);
        $security = security::find($request->input('security_record_id'));
        $security->delete();


    }
}
