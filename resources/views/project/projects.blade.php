@extends('layout.app')
@section('title', 'Project List')
@section('parentPageTitle', 'Project')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/css/treeview.css')}}"/>
@stop
@section('content')
<div class="row clearfix">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card state_w1">
            <div class="body d-flex justify-content-between">
                <div>
                    <h5>{{ $total_projects->count() }}</h5>
                    <span>Total Projects</span>
                </div>
                <div class="sparkline" data-type="bar" data-width="97%" data-height="55px" data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#b80dbf">1,5,2,9,4,7,2,1</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card state_w1">
            <div class="body d-flex justify-content-between">
                <div>
                    <h5>{{ $in_progress_projects->count() }}</h5>
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
                    <h5>{{ $open_projects->count() }}</h5>
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
                    <h5>{{ $closed_projects->count() }}</h5>
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
                    <h5>{{ $resolved_projects->count() }}</h5>
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
                <form action='{{ route('projects') }}' class="form-group" method="GET">
                    @csrf
                    <div class="col-lg-4 col-md-6 inlineblock">
                    <div style="margin-left: -15px;" class="input-group masked-input mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-search"></i></span>
                        </div>
                        <input value=' {{ request('search') }}' name='search' type="search" class="form-control datetime" placeholder="search">
                    </div>
                    </div>
                    <button style="margin-bottom: 10px;" type="submit" class="btn btn-primary">filter</button>
                </form>
                        @foreach ($projects as $project )
                                <details >
                                    <summary>#{{ $project->id }}  {{ $project->title }} <small class='text-white float-right'>{{ date('d/m/Y h:s', strtotime($project->created_at)); }}</small></summary>
                                    <div class="folder">
                                        <div class="inlineblock float-left">
                                            <a class="btn btn-warning-block inlineblock" href="{{ route('show.project',$project->id) }}"><strong>#{{ $project->id }} </strong>More Detail</a>
                                            @if ($project->status =='open')
                                            <span class="badge badge-primary">{{ $project->status }}</span>

                                            @elseif ($project->status =='in progress')
                                            <span class="badge badge-warning">{{ $project->status }}</span>

                                            @elseif ($project->status =='resolve')
                                            <span class="badge badge-success">{{ $project->status }}</span>

                                            @else
                                            <span class="badge badge-danger">{{ $project->status }}</span>

                                            @endif
                                            @if ($project->priority =='low')
                                            <span class="badge badge-primary">{{ $project->priority }}</span>

                                            @elseif ($project->priority =='medium')
                                            <span class="badge badge-warning">{{ $project->priority }}</span>

                                            @else
                                            <span class="badge badge-danger">{{ $project->priority }}</span>

                                            @endif
                                        </div>
                                        <div class="float-right">
                                            <small  style='color:rgb(61, 18, 18)'>{{ date('d/m/Y h:m', strtotime($project->end_time));  }}</small>
                                        </div>
                                        <div class='clearfix'></div>
                                        <p class="p-0.5">{{ $project->description }}</p>
                                        <details >
                                            <summary>Tickets > {{ $project->tickets->count() }}</summary>
                                            <div class="folder">
                                                @forelse (  $project->tickets as $ticket  )
                                                    <details>
                                                        <summary>#{{ $ticket->id }} {{ $ticket->title }}<small class='text-white float-right'> {{ date('d/m/Y h:s', strtotime($ticket->created_at)); }}</small></summary>
                                                        <div class="folder">
                                                             <div class="inlineblock float-left">
                                                                <a class="btn btn-warning-block inlineblock" href="{{ route('show.ticket',$ticket->id) }}"><strong>#{{ $ticket->id }} </strong>More Detail</a>
                                                                @if ($ticket->status =='open')
                                                                <span class="badge badge-primary">{{ $ticket->status }}</span>

                                                                @elseif ($ticket->status =='in progress')
                                                                <span class="badge badge-warning">{{ $ticket->status }}</span>

                                                                @elseif ($ticket->status =='resolve')
                                                                <span class="badge badge-success">{{ $ticket->status }}</span>

                                                                @else
                                                                <span class="badge badge-danger">{{ $ticket->status }}</span>

                                                                @endif
                                                                @if ($ticket->priority =='low')
                                                                <span class="badge badge-primary">{{ $ticket->priority }}</span>

                                                                @elseif ($ticket->priority =='medium')
                                                                <span class="badge badge-warning">{{ $ticket->priority }}</span>

                                                                @else
                                                                <span class="badge badge-danger">{{ $ticket->priority }}</span>

                                                                @endif
                                                            </div>
                                                            <div class="float-right"><small style='color:black'>{{ date('d/m/Y h:m', strtotime($ticket->end_time));  }}</small></div></br>
                                                            <div class='clearfix'></div>
                                                        <p class="p-0.5">{{ $ticket->description }}</p>
                                                        <div class="body">
                                                            <ul class="comment-reply list-unstyled">
                                                                @comments(['model' => $ticket])
                                                            </ul>
                                                        </div>
                                                        </div>
                                                    </details>
                                                @empty
                                                    no ticket for this project
                                                @endforelse
                                            </div>
                                        </details>
                                    </div>
                                </details>
                        @endforeach



            </div>
            <div class="mt-3 d-flex justify-content-center">
                {{$projects->links()}}
            </div>
        </div>
    </div>
</div>
@stop
@section('page-script')
<script src="{{asset('assets/bundles/sparkline.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/charts/sparkline.js')}}"></script>
@stop

