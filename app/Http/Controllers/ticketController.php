<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ticketController extends Controller
{
    //


    public function index(){

        $total_tickets = Ticket::all();
        $pending_tickets = Ticket::where('status','pending')->get();
        $open_tickets = Ticket::where('status','open')->get();
        $closed_tickets = Ticket::where('status','close')->get();
        $resolved_tickets = Ticket::where('status','resolve')->get();
        $tickets = Ticket::latest()->paginate(5);
        return view('project.ticket.tickets')->with([
            'tickets' => $tickets,
            'total_tickets' => $total_tickets,
            'pending_tickets' => $pending_tickets,
            'closed_tickets' => $closed_tickets,
            'resolved_tickets' => $resolved_tickets,
            'open_tickets' => $open_tickets
        ]);
    }

    public function create(){

        return view('project.ticket.create');
    }

    public function show($id){
        $ticket = Ticket::find($id);

        $user = User::where('name',$ticket->created_by)->first();

        return view('project.ticket.ticket')->with([
            'ticket' => $ticket,
            'user' => $user
        ]);
    }

     public function store(Request $request)
    {
        $total_tickets = Ticket::all();
        $pending_tickets = Ticket::where('status','pending')->get();
        $open_tickets = Ticket::where('status','open')->get();
        $closed_tickets = Ticket::where('status','close')->get();
        $resolved_tickets = Ticket::where('status','resolve')->get();
            $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'description' => 'required',
        ]);

        $ticket = Ticket::create([
            'title' => $request->title,
            'priority' => $request->priority,
            'description' => $request->description,
            'image' => $request->image,
            'created_by' => Auth::user()->name
        ]);

        $tickets = Ticket::latest()->paginate(5);
        return view('project.ticket.tickets')->with([
            'tickets' => $tickets,
            'success' => 'ticket created successfully',
            'total_tickets' => $total_tickets,
            'pending_tickets' => $pending_tickets,
            'closed_tickets' => $closed_tickets,
            'resolved_tickets' => $resolved_tickets,
            'open_tickets' => $open_tickets
        ]);

    }

      public function update(Request $request,$id)
    {


            $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'description' => 'required',
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
            'created_by' => Auth::user()->name
        ]);

        return redirect()->route('show.ticket',$ticket->id)->with([
            'success' => 'ticket updated successfully'
        ]);

    }

    public function edit($id){

        $ticket = Ticket::find($id);

        return view('project.ticket.edit')->with([
            'ticket' => $ticket
        ]);
    }

    public function delete($id){
          $ticket = Ticket::find($id);

          $ticket->delete();
        return redirect()->route('tickets')->with([
            'success' => 'ticket deleted successfully'
        ]);
    }
}
