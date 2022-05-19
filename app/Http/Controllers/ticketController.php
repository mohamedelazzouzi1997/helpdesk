<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ticketController extends Controller
{
    //


    public function index(Request $request){

        $tickets = Ticket::tree()->latest()->get()->toTree();


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

        return view('project.ticket.ticket')->with([
            'ticket' => $ticket,
            'user_ticket_count' => $user_ticket_count,
            'user_ticket_close' => $user_ticket_close,
            'user_ticket_open' => $user_ticket_open,
            'user_ticket_in_progress' => $user_ticket_in_progress,
        ]);
    }

     public function store(Request $request){


        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'end_time' => 'required',
        ]);

        $ticket = Ticket::create([
            'title' => $request->title,
            'priority' => $request->priority,
            'description' => $request->description,
            'image' => $request->image,
            'created_by' => Auth::user()->name,
            'user_id'=> $request->user_id,
            'end_time' => $request->end_time,
            'parent_id' => $request->parent_id
        ]);
        return redirect()->route('show.ticket',$ticket->id)->with([
            'success' => 'ticket created successfully'
        ]);

    }

      public function update(Request $request,$id){


            $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'end_time' => 'required',
        ]);

        $ticket = Ticket::find($id);
        if($request->has('image')){
                $image = $request->image;
            }
        else{
                $image = $ticket->image;
        }
        $ticket->update([
            'title' => $request->title,
            'priority' => $request->priority,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $image,
            'end_time' => $request->end_time,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('show.ticket',$ticket->id)->with([
            'success' => 'ticket updated successfully'
        ]);

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

        $ticket->update([
            'status' => 'resolve',
        ]);

        return redirect()->route('show.ticket',$ticket->id)->with([
            'success' => 'ticket updated successfully'
        ]);

    }
}
