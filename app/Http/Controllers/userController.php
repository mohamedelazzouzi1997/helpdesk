<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    //

    public function update(Request $request,$id){

        $user =  User::find($id);

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/profile/'.$filename);
            $user->update([
            'image' => $filename,
        ]);

        }

        return \redirect()->back()->with([
            'success' => 'picture updated'
        ]);
    }
}
