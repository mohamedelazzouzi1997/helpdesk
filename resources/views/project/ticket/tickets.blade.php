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
                    <h5>{{ $pending_tickets->count() }}</h5>
                    <span>Total Tickets</span>
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
                    <span>Pending</span>
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
                <table class="table table-hover c_table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>description</th>
                            <th>Title</th>
                            <th>Created by</th>
                            <th>Date</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                            @foreach ($tickets as $ticket )
                            <tr>
                                <td><strong>{{ $ticket->id }}</strong></td>
                                <td>{{ $ticket->description }}</td>
                                <td>{{ $ticket->title }}</td>
                                <td>{{ $ticket->created_by }}</td>
                                <td>{{ $ticket->created_at }}</td>
                                <td>

                                        @if ($ticket->priority =='low')
                                            <span class="badge badge-primary">{{ $ticket->priority }}</span>
                                        @elseif ($ticket->priority =='medium')
                                            <span class="badge badge-warning">{{ $ticket->priority }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ $ticket->priority }}</span>
                                        @endif

                               </td>
                                <td>

                                        @if ($ticket->status =='open')
                                            <span class="badge badge-primary">{{ $ticket->status }}</span>
                                        @elseif ($ticket->status =='pending')
                                            <span class="badge badge-warning">{{ $ticket->status }}</span>
                                        @elseif ($ticket->status =='resolve')
                                            <span class="badge badge-success">{{ $ticket->status }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ $ticket->status }}</span>
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
                                    <a href="{{ route('show.ticket',$ticket->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
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
