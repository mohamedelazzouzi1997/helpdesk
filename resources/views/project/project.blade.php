@extends('layout.app')
@section('title', 'ticket / ' . $project->id)
@section('parentPageTitle', 'Project')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/charts-c3/plugin.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/summernote/dist/summernote.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/css/treeview.css')}}"/>
@stop

@section('content')
<div class="row clearfix">
    <div class="col-lg-4 col-md-12">
        <div class="card mcard_4">
            <div class="body">
                {{-- <ul class="header-dropdown list-unstyled">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-menu"></i> </a>
                        <ul class="dropdown-menu slideUp">
                            <li><a href="{{ route('edit.ticket',$ticket->id) }}">Edit</a></li>
                            <li>
                                <a href="{{ route('delete.ticket',$ticket->id) }}">Delete</a>
                            </li>
                        </ul>
                    </li>
                </ul> --}}
                <div class="img">
                    <img class='rounded-circle' width="175" height='175'  src="{{ $assignet_to->image == null ? 'https://ui-avatars.com/api/?color=ff0000&name='.$assignet_to->name : asset('upload/profile/'.$assignet_to->image) }}" class="rounded-circle" alt="profile-image">
                </div>
                <div class="user">
                    <h5 class="mt-3 mb-1">{{ $project->assignet_to }}</h5>
                    <small class="text-muted">{{ $assignet_to->email }}</small>
                    <ul class="list-unstyled mt-3 mr-lg-3  d-flex">
                        <li class="mr-3"><strong class='badge badge-primary'>Total:-</strong> {{ $user_project_count->count() }}</li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="card">
            <div style="padding-left: 18px;" class="header">
                <h2><strong>Project</strong> Info</h2>
            </div>
            <div class="body">
                <small class="text-muted">Title: </small>
                <p>{{ $project->title }}</p>
                <hr>
                <small class="text-muted">Created Date: </small>
                <p>{{ date('d/m/Y h:m', strtotime($project->created_at)); }}</p>
                <hr>
                <small class="text-muted">DeadLine Date: </small>
                <p>{{ date('d/m/Y h:m', strtotime($project->end_time)); }}</p>
                <hr>
                <ul class="list-unstyled">
                    <li>
                        <div>priority</div>
                            @if ($project->priority =='low')
                                <span class="badge badge-primary">{{ $project->priority }}</span>
                            @elseif ($project->priority =='medium')
                                <span class="badge badge-warning">{{ $project->priority }}</span>
                            @else
                                <span class="badge badge-danger">{{ $project->priority }}</span>
                            @endif
                    </li>
                    <li>
                        <div>status</div>
                            @if ($project->status =='open')
                                <span class="badge badge-primary">{{ $project->status }}</span>
                            @elseif ($project->status =='in progress')
                                <span class="badge badge-warning">{{ $project->status }}</span>
                            @elseif ($project->status =='resolve')
                                <span class="badge badge-success">{{ $project->status }}</span>
                            @else
                                <span class="badge badge-danger">{{ $project->status }}</span>
                            @endif
                    </li>
                </ul>

                {{-- <small class="text-muted">Team: </small>
                <ul class="list-unstyled team-info margin-0">
                    <li><img src="{{asset('assets/images/xs/avatar7.jpg')}}" alt="Avatar"></li>
                    <li><img src="{{asset('assets/images/xs/avatar8.jpg')}}" alt="Avatar"></li>
                    <li><img src="{{asset('assets/images/xs/avatar9.jpg')}}" alt="Avatar"></li>
                    <li><img src="{{asset('assets/images/xs/avatar2.jpg')}}" alt="Avatar"></li>
                    <li><img src="{{asset('assets/images/xs/avatar3.jpg')}}" alt="Avatar"></li>
                </ul> --}}
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="body">
                <h5><span style='color:#e88797'>Ticket</span> Description</h5>
                <span>{{ $project->description }}</span>
            </div>
        </div>
        <div style="padding-left: 18px;" class="header">
            <h2><strong>Project ></strong> Tickets</h2>
        </div>
        <div class="card">
            <details >
                <summary>Tickets > {{ $project->tickets->count() }}</summary>
                <div class="folder">
                    @if (count($project->tickets) )
                        @include('project.project_tickets',$project->tickets)
                    @else
                        no ticket for this project yet
                    @endif
                </div>
            </details>
        </div>
    </div>
</div>
@stop
@section('page-script')
<script src="{{asset('assets/bundles/c3.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/summernote/dist/summernote.js')}}"></script>
<script src="{{asset('assets/js/pages/ticket-page.js')}}"></script>
@stop
