@extends('layout.app')
@section('title', 'ticket / ' . $ticket->id)
@section('parentPageTitle', 'Project')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/charts-c3/plugin.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/summernote/dist/summernote.css')}}"/>
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
                <div class="img">
                    <img src="{{asset('assets/images/lg/avatar2.jpg')}}" class="rounded-circle" alt="profile-image">
                </div>
                <div class="user">
                    <h5 class="mt-3 mb-1">{{ $ticket->created_by }}</h5>
                    <small class="text-muted">{{ $user->email }}</small>
                    <ul class="list-unstyled mt-3 d-flex">
                        <li class="mr-3"><strong>Total:-</strong> 13</li>
                        <li class="mr-3"><strong>Open:-</strong> 4</li>
                        <li><strong>Closed:-</strong> 9</li>
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
                <small class="text-muted">Date: </small>
                <p>{{ $ticket->created_at }}</p>
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
                            @elseif ($ticket->status =='pending')
                                <span class="badge badge-warning">{{ $ticket->status }}</span>
                            @elseif ($ticket->status =='resolve')
                                <span class="badge badge-success">{{ $ticket->status }}</span>
                            @else
                                <span class="badge badge-danger">{{ $ticket->status }}</span>
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
                <h5>Ticket</h5>
                <span>{{ $ticket->description }}</span>
            </div>
        </div>
        <div class="card">
            <div style="padding-left: 18px;" class="header">
                <h2><strong>Ticket</strong> Replies</h2>
            </div>
            <div class="body mb-2">
                <div class="summernote">
                    Hello there,
                </div>
            </div>
            <div class="body">
                <ul class="comment-reply list-unstyled">
                    @comments(['model' => $ticket])
                </ul>
            </div>
        </div>
    </div>
</div>
@stop
@section('page-script')
<script src="{{asset('assets/bundles/c3.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/summernote/dist/summernote.js')}}"></script>
<script src="{{asset('assets/js/pages/ticket-page.js')}}"></script>
@stop
