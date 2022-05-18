@extends('layout.app')
@section('title', 'Taskboard')
@section('parentPageTitle', 'ticket')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/css/treeview.css')}}"/>
@stop
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

        <div class="card ticket_list">
            <div class="table-responsive">
                    <ul>
                        @foreach ($tickets as $ticket )
                            <x-ticket :ticket='$ticket' ></x-ticket>
                            <hr>
                        @endforeach
                    </ul>
            </div>
            {{-- <div class="mt-3 d-flex justify-content-center">
                {{$tickets->links()}}
            </div> --}}
        </div>
    </div>
</div>
@stop
@section('page-script')
<script src="{{asset('assets/bundles/sparkline.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/charts/sparkline.js')}}"></script>
<script src="{{asset('assets/js/treeview.js')}}"></script>
@stop
