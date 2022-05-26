<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Project;
use App\Mail\ticketMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use App\Notifications\TicketNotification;

class ticketController extends Controller
{
    //


    public function index(){

        $tickets = Ticket::whereNull('parent_id')->with('children')->latest()->paginate(10);


        $total_tickets = Ticket::all();
        $in_progress_tickets = Ticket::where('status','in progress')->get();
        $open_tickets = Ticket::where('status','open')->get();
        $closed_tickets = Ticket::where('status','close')->get();
        $resolved_tickets = Ticket::where('status','resolve')->get();

        return view('project.ticket.tickets')->with([
            'tickets' => $tickets,
            'total_tickets' => $total_tickets,
            'in_progress_tickets' => $in_progress_tickets,
            'closed_tickets' => $closed_tickets,
            'resolved_tickets' => $resolved_tickets,
            'open_tickets' => $open_tickets
        ]);
    }

    public function create(){

        $users = User::all();

        return view('project.ticket.create')->with([
            'users' => $users,
        ]);
    }

    public function createSubTicket($id){

        $parent_id = $id;
        $users = User::all();

        return view('project.ticket.createSubTicket')->with([
            'users' => $users,
            'parent_id' => $parent_id
        ]);
    }

    public function show($id){
        $ticket = Ticket::find($id);

        $user_id = $ticket->user->id;

        $user_ticket_count = Ticket::where('user_id',$user_id)->get();
        $user_ticket_close = Ticket::where('user_id',$user_id)->where('status', 'close')->get();
        $user_ticket_open = Ticket::where('user_id',$user_id)->where('status', 'open')->get();
        $user_ticket_in_progress = Ticket::where('user_id',$user_id)->where('status', 'in progress')->get();
        $user_ticket_resolve = Ticket::where('user_id',$user_id)->where('status', 'resolve')->get();

        return view('project.ticket.ticket')->with([
            'ticket' => $ticket,
            'user_ticket_count' => $user_ticket_count,
            'user_ticket_close' => $user_ticket_close,
            'user_ticket_open' => $user_ticket_open,
            'user_ticket_in_progress' => $user_ticket_in_progress,
            'user_ticket_resolve' => $user_ticket_resolve,
        ]);
    }

     public function store(Request $request){


        $validated = $request->validate([
            'title' => 'required|max:20',
            'description' => 'required|max:255',
            'user_id' => 'required',
            'end_time' => 'required',
            'image' => 'max:2048'
        ]);

        if($request->has('image')){
            $file = $request->image;
            $extention = $file->getClientOriginalName();
            $filename = time().'_'. $extention;
            $file->move(public_path('upload/tickets/'),$filename);
        }else{
            $filename = $request->image;
        }

        $ticket = Ticket::create([
            'title' => $request->title,
            'priority' => $request->priority,
            'description' => $request->description,
            'image' => $filename,
            'created_by' => Auth::user()->name,
            'user_id'=> $request->user_id,
            'end_time' => $request->end_time,
            'parent_id' => $request->parent_id
        ]);

        if($ticket){
            $user = User::where('id', $request->user_id)->first();


            Mail::to($user->email)->send(new ticketMail($user,$ticket, Auth::user()));

            $user->notify(new TicketNotification($ticket));

            return redirect()->route('show.ticket',$ticket->id)->with([
            'success' => 'ticket created successfully'
            ]);
        }else{
             return redirect()->route('create.ticket')->with([
            'fail' => 'ticket created faild'
            ]);
        }
    }

    public function update(Request $request,$id){

        $validated = $request->validate([
            'title' => 'required|max:20',
            'description' => 'required|max:255',
            'user_id' => 'required',
            'end_time' => 'required',
            'image' => 'max:2048'
        ]);

        $ticket = Ticket::find($id);

        if($request->has('image')){
            $file = $request->image;
            $extention = $file->getClientOriginalName();
            $filename = time().'_'. $extention;
            $file->move(public_path('upload/tickets/'),$filename);
        }else{
            $filename = $ticket->image;
        }


        $updated = $ticket->update([
            'title' => $request->title,
            'priority' => $request->priority,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $filename,
            'end_time' => $request->end_time,
            'user_id' => $request->user_id
        ]);
        if($updated){
            return redirect()->route('show.ticket',$ticket->id)->with([
                        'success' => 'ticket updated successfully'
                    ]);
        }else{
            return redirect()->route('show.ticket',$ticket->id)->with([
                        'success' => 'ticket not updated'
                    ]);
}
    }


    public function edit($id){

        $ticket = Ticket::find($id);
        $users = User::all();

        return view('project.ticket.edit')->with([
            'ticket' => $ticket,
            'users' => $users
        ]);
    }


    public function delete($id){
        $ticket = Ticket::find($id);

        $ticket->delete();
        return redirect()->route('tickets')->with([
            'success' => 'ticket deleted successfully'
        ]);
    }

    public function resolve($id){

        $ticket = Ticket::find($id);

        $updated = $ticket->update([
            'status' => 'resolve',
        ]);

        if($updated){
            return redirect()->route('show.ticket',$ticket->id)->with([
                'success' => 'ticket resolved successfully'
            ]);
        }else{
            return redirect()->route('show.ticket',$ticket->id)->with([
                'success' => 'ticket resolved faild'
            ]);
        }

    }
}
