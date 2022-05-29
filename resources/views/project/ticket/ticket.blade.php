@extends('layout.app')
@section('title', 'ticket / ' . $ticket->id)
@section('parentPageTitle', 'Project')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/charts-c3/plugin.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/summernote/dist/summernote.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/css/alert.css')}}"/>
@stop
@section('content')
<div class="row clearfix">
    <div class="col-lg-4 col-md-12">
        <div class="card mcard_4">
            <div class="body">
                <ul class="header-dropdown list-unstyled">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-menu"></i> </a>
                        <ul class="dropdown-menu slideUp">
                            <li><a href="{{ route('edit.ticket',$ticket->id) }}">Edit</a></li>
                            <li>
                                <a href="{{ route('delete.ticket',$ticket->id) }}">Delete</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="img mx-auto">
                    <img class='rounded-circle' width="175" height='175'  src="{{ $ticket->user->image == null ? 'https://ui-avatars.com/api/?color=ff0000&name='.$ticket->user->name : asset('upload/profile/'.$ticket->user->image) }}" class="rounded-circle" alt="profile-image">
                </div>
                <div class="user">
                    <h5 class="mt-3 mb-1">{{ $ticket->user->name }}</h5>
                    <small class="text-muted">{{ $ticket->user->email }}</small>
                    <ul class="list-unstyled mt-3 mr-lg-3  d-flex">
                        <li class="mr-3"><strong class='badge badge-primary'>Open:-</strong> {{ $user_ticket_open->count() }}</li>
                        <li class="mr-3"><strong class='badge badge-warning'>In progress:-</strong> {{ $user_ticket_in_progress->count() }}</li>
                        <li class="mr-3"><strong class='badge badge-success'>resolved:-</strong> {{ $user_ticket_resolve->count() }}</li>
                        <li class="mr-3"><strong class='badge badge-danger'>Closed:-</strong> {{ $user_ticket_close->count() }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card">
            <div style="padding-left: 18px;" class="header">
                <h2><strong>Ticket</strong> Info</h2>
            </div>
            <div class="body">
                <small class="text-muted">Title: </small>
                <p>{{ $ticket->title }}</p>
                <hr>
                <small class="text-muted">Created Date: </small>
                <p>{{ $ticket->created_at->diffForHumans() }}</p>
                <hr>
                <small class="text-muted">DeadLine Date: </small>
                <p>{{ date('d/m/Y h:s', strtotime($ticket->end_time)); }}</p>
                <hr>
                <ul class="list-unstyled">
                    <li>
                        <div>priority</div>
                            @if ($ticket->priority =='low')
                                <span class="badge badge-primary">{{ $ticket->priority }}</span>
                            @elseif ($ticket->priority =='medium')
                                <span class="badge badge-warning">{{ $ticket->priority }}</span>
                            @else
                                <span class="badge badge-danger">{{ $ticket->priority }}</span>
                            @endif
                    </li>
                    <li>
                        <div>status</div>
                            @if ($ticket->status =='open')
                                <span class="badge badge-primary">{{ $ticket->status }}</span>
                            @elseif ($ticket->status =='in progress')
                                <span class="badge badge-warning">{{ $ticket->status }}</span>
                            @elseif ($ticket->status =='resolve')
                                <span class="badge badge-success">{{ $ticket->status }}</span>
                            @else
                                <span class="badge badge-danger">{{ $ticket->status }}</span>
                            @endif
                            <a href="{{ route('resolve.ticket',$ticket->id) }}" class="btn btn-success float-right"><i class="fa fa-check"></i></a>
                            @if($ticket->status !='resolve')
                            @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-8 col-md-12 pt-0">
        <div style='margin-top:-22px' class="card">
            <div style="padding-left: 18px;" class="header">
                <h2><strong>Ticket</strong> Description</h2>
            </div>
            <div class="body">
                <span>{{ $ticket->description }}</span>
            </div>
        </div>
        <div class="card">
            <div style="padding-left: 18px;" class="header">
                <h2><strong>Ticket</strong> Comments</h2>
            </div>
            <div class="body">
                <ul class="comment-reply list-unstyled">
                    @comments(['model' => $ticket])
                </ul>
            </div>
        </div>
        @if ($ticket->image != NULL)
            <div class="card">
                <div class="body">
                     <h5><span style='color:#e88797'>Ticket</span> image</h5>
                    <!-- Modal -->
                    <a width='100%' class="btn btn-link" data-toggle="modal" data-target=".bd-example-modal-lg">
                        <img width='100%' height="100%" id="myImg" src="{{ asset('/upload/tickets/'.$ticket->image) }}" alt="Snow">
                    </a>
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <img width='100%' height="70%" id="myImg" src="{{ asset('/upload/tickets/'.$ticket->image) }}" alt="Snow" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    </div>
</div>

@stop
@section('page-script')
<script src="{{asset('assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>
<script src="{{asset('assets/js/pages/ui/notifications.js')}}"></script>
<script src="{{asset('assets/bundles/c3.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/summernote/dist/summernote.js')}}"></script>
<script src="{{asset('assets/js/pages/ticket-page.js')}}"></script>
<script src="{{asset('assets/js/alert.js')}}"></script>
@stop
