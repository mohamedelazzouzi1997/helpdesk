<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    //

    public function update(Request $request,$id){

        $user =  User::find($id);

        if($request->has('image')){
            $file = $request->image;
            $extention = $file->getClientOriginalName();
            $filename = time().'_'. $extention;
            $file->move(public_path('upload/profile/'),$filename);
            $user->update([
            'image' => $filename,
        ]);

        }

        return \redirect()->back()->with([
            'success' => 'picture updated'
        ]);
    }
}
