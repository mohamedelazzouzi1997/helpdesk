<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class projectController extends Controller
{
    //

    public function index(Request $request){

        (string) $value = $request->search;

        if($request->has('search')){
            $projects = Project::where('status','LIKE', '%'.$value.'%')
                                ->orwhere('id',$value)
                                ->orwhere('title','LIKE', '%'.$value.'%')
                                ->orwhere('priority','LIKE', '%'.$value.'%')

                                // ->join('users', 'users.id', '=', 'tickets.user_id')->where('users.name','like','%'.$value.'%')
                                ->paginate(10);


        }else{
            $projects = Project::latest()->paginate(10);
        }

        $total_projects = Project::all();
        $in_progress_projects = Project::where('status','in progress')->get();
        $open_projects = Project::where('status','open')->get();
        $closed_projects = Project::where('status','close')->get();
        $resolved_projects = Project::where('status','resolve')->get();

        return view('project.projects')->with([
            'projects' => $projects,
            'total_projects' => $total_projects,
            'in_progress_projects' => $in_progress_projects,
            'closed_projects' => $closed_projects,
            'resolved_projects' => $resolved_projects,
            'open_projects' => $open_projects
        ]);
    }


    public function show($id){

        $project = Project::find($id);

        $assignet_to = User::where('name', $project->Assigned_to)->first();
        $user_project_count = Project::where('Assigned_to', $assignet_to)->get();


        return view('project.project')->with([
            'project' => $project,
            'assignet_to' => $assignet_to,
            'user_project_count' => $user_project_count
        ]);

    }


    public function create(){
        $users = User::all();

        return view('project.create')->with( [
            'users' => $users,
        ]);
    }

    public function store(Request $request){

       $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'end_time' => 'required',
        ]);

        if($validated){

             $ticket = Project::create([
                'title' => $request->title,
                'priority' => $request->priority,
                'description' => $request->description,
                'created_by' => Auth::user()->name,
                'Assigned_to'=> $request->Assigned_to,
                'end_time' => $request->end_time

             ]);
             if($ticket){
                 return redirect()->route('projects');
                    // return redirect()->route('show.project',$project->id)->with([
                    //     'success' => 'project created successfully'
                    // ]);
             }else{
                return redirect()->back();
             }

        }else{
            return redirect()->back();
        }

    }
}
