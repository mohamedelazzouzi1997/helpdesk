@extends('layout.app')
@section('title', 'Taskboard')
@section('parentPageTitle', 'Project')
@section('content')
<div class="row clearfix">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card state_w1">
            <div class="body d-flex justify-content-between">
                <div>
                    <h5>{{ $total_tickets->count() }}</h5>
                    <span>Total Tickets</span>
                </div>
                <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#b80dbf">1,5,2,9,4,7,2,1</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card state_w1">
            <div class="body d-flex justify-content-between">
                <div>
                    <h5>{{ $in_progress_tickets->count() }}</h5>
                    <span>in progress</span>
                </div>
                <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#FFC107">5,2,3,7,6,4,8,1</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card state_w1">
            <div class="body d-flex justify-content-between">
                <div>
                    <h5>{{ $open_tickets->count() }}</h5>
                    <span>open</span>
                </div>
                <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#46b6fe">8,2,6,5,1,4,4,3</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card state_w1">
            <div class="body d-flex justify-content-between">
                <div>
                    <h5>{{ $closed_tickets->count() }}</h5>
                    <span>closed</span>
                </div>
                <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#ee2558">4,4,3,9,2,1,5,7</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card state_w1">
            <div class="body d-flex justify-content-between">
                <div>
                    <h5>{{ $resolved_tickets->count() }}</h5>
                    <span>Resolve</span>
                </div>
                <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#04BE5B">7,5,3,8,4,6,2,9</div>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="card project_list">
            <div class="table-responsive">
                <form action='{{ route('tickets') }}' class="form-group" method="GET">
                    @csrf
                    <div class="col-lg-4 col-md-6">
                    <div class="input-group masked-input mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-search"></i></span>
                        </div>
                        <input name='search' type="search" class="form-control datetime" placeholder="search">
                    </div>
                    </div>

                    <button type="submit" class="btn btn-primary">filter</button>
                </form>
                <table class="table table-hover c_table">
                    <thead class='text-center'>
                        <tr>
                            <th>#</th>
                            <th>description</th>
                            <th>Title</th>
                            <th>Created by</th>
                            <th>Date</th>
                            <th>assigned_to</th>
                            <th>DeadLine</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class='text-center'>

                            @foreach ($tickets as $ticket )

                                <tr>

                                        <td><a class="btn btn-link" href="{{ route('show.ticket',$ticket->id) }}"><strong>{{ $ticket->id }}</strong></a></td>
                                        <td><a class="btn btn-link" href="{{ route('show.ticket',$ticket->id) }}">{{ $ticket->description }}</a></td>
                                        <td><a class="btn btn-link" href="{{ route('show.ticket',$ticket->id) }}">{{ $ticket->title }}</a></td>
                                        <td><a class="btn btn-link" href="{{ route('show.ticket',$ticket->id) }}">{{ $ticket->created_by }}</a></td>
                                        <td><a class="btn btn-link" href="{{ route('show.ticket',$ticket->id) }}">{{ date('d/m/Y h:m', strtotime($ticket->created_at)); }}</a></td>
                                        <td><a class="btn btn-link" href="{{ route('show.ticket',$ticket->id) }}">{{ $ticket->user->name }}</a></td>
                                        <td><a class="btn btn-link" href="{{ route('show.ticket',$ticket->id) }}">{{ $ticket->end_time }}</a></td>
                                        <td>

                                                @if ($ticket->priority =='low')
                                                <a class="btn btn-link" href="{{ route('show.ticket',$ticket->id) }}"><span class="badge badge-primary">{{ $ticket->priority }}</span></a>

                                                @elseif ($ticket->priority =='medium')
                                                <a class="btn btn-link" href="{{ route('show.ticket',$ticket->id) }}"><span class="badge badge-warning">{{ $ticket->priority }}</span></a>

                                                @else
                                                <a class="btn btn-link" href="{{ route('show.ticket',$ticket->id) }}"><span class="badge badge-danger">{{ $ticket->priority }}</span></a>

                                                @endif

                                        </td>
                                        <td>

                                                @if ($ticket->status =='open')
                                                <a class="btn btn-link" href="{{ route('show.ticket',$ticket->id) }}"><span class="badge badge-primary">{{ $ticket->status }}</span></a>

                                                @elseif ($ticket->status =='in progress')
                                                <a class="btn btn-link" href="{{ route('show.ticket',$ticket->id) }}"><span class="badge badge-warning">{{ $ticket->status }}</span></a>

                                                @elseif ($ticket->status =='resolve')
                                                <a class="btn btn-link" href="{{ route('show.ticket',$ticket->id) }}"><span class="badge badge-success">{{ $ticket->status }}</span></a>

                                                @else
                                                <a class="btn btn-link" href="{{ route('show.ticket',$ticket->id) }}"> <span class="badge badge-danger">{{ $ticket->status }}</span></a>

                                                @endif

                                        </td>
                                        <td>
                                            <div class='btn-group'>
                                                <a href="{{ route('delete.ticket',$ticket->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </div>
                                            <div class='btn-group'>
                                                <a href="{{ route('edit.ticket', $ticket->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            </div>
                                            <div class='btn-group'>
                                                <a href="{{ route('resolve.ticket',$ticket->id) }}" class="btn btn-success"><i class="fa fa-check"></i></a>
                                            </div>
                                        </td>

                                </tr>

                            @endforeach


                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center">
                {{$tickets->links()}}
            </div>

        </div>
    </div>
</div>
@stop
@section('page-script')
<script src="{{asset('assets/bundles/sparkline.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/charts/sparkline.js')}}"></script>
@stop
