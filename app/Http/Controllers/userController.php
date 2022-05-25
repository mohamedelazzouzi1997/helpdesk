<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class userController extends Controller
{
    //

    public function index(){

        $user_id = Auth::user()->id;


        $user_ticket_count = Ticket::where('user_id',$user_id)->get();
        $user_ticket_close = Ticket::where('user_id',$user_id)->where('status', 'close')->get();
        $user_ticket_open = Ticket::where('user_id',$user_id)->where('status', 'open')->get();
        $user_ticket_in_progress = Ticket::where('user_id',$user_id)->where('status', 'in progress')->get();

        return view('profile.profile')->with([

            'user_ticket_count' => $user_ticket_count,
            'user_ticket_close' => $user_ticket_close,
            'user_ticket_open' => $user_ticket_open,
            'user_ticket_in_progress' => $user_ticket_in_progress,
        ]);;
    }

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
