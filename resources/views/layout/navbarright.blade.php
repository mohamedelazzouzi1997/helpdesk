<?php
    $tasks = App\Models\Ticket::where('user_id',  Auth::user()->id)
                    ->whereIn('status',['open','in progress'])
                    ->get();
    $user = App\Models\User::find(Auth::user()->id);


?>
<div class="navbar-right">
    <ul class="navbar-nav">
        <li><a href="#search" class="main_search" title="Search..."><i class="zmdi zmdi-search"></i></a></li>
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" title="App" data-toggle="dropdown" role="button"><i class="zmdi zmdi-apps"></i></a>
            <ul class="dropdown-menu slideUp2">
                <li class="header">App Sortcute</li>
                <li class="body">
                    <ul class="menu app_sortcut list-unstyled">
                        <li>
                            <a href="">
                                <div class="icon-circle mb-2 bg-blue"><i class="zmdi zmdi-camera"></i></div>
                                <p class="mb-0">Photos</p>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle mb-2 bg-amber"><i class="zmdi zmdi-translate"></i></div>
                                <p class="mb-0">Translate</p>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <div class="icon-circle mb-2 bg-green"><i class="zmdi zmdi-calendar"></i></div>
                                <p class="mb-0">Calendar</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="icon-circle mb-2 bg-purple"><i class="zmdi zmdi-account-calendar"></i></div>
                                <p class="mb-0">Contacts</p>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle mb-2 bg-red"><i class="zmdi zmdi-tag"></i></div>
                                <p class="mb-0">News</p>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle mb-2 bg-grey"><i class="zmdi zmdi-map"></i></div>
                                <p class="mb-0">Maps</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" title="Notifications" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i>
                <div class="notify"><span class="heartbit"></span><span class="point">@if ($user->unreadNotifications->count())
                <span data-count='{{ $user->unreadNotifications->count() }}' id='notifCount' class="badge badge-danger">{{ $user->unreadNotifications->count() }}</span>
            @endif</span></div>
            </a>
            <ul class="dropdown-menu slideUp2">
                <li class="header">Notifications</li>
                @forelse( $user->unreadNotifications as $notification )
                <li class="ml-3" style="border-bottom: .5px solid #eee; margin-bottom:0px">
                    <a style="padding-bottom: 0px" href="{{ route('show.ticket',$notification->data['ticket']['id']) }}">
                            <div style="width: 100%;" class="progress-container progress-primary">

                                <span ><small class="text-danger text-truncate">{{ $notification->data['ticket']['title'] }}</small>

                                </span>

                                <ul class="list-unstyled team-info">
                                    <li style=" margin-bottom:0px" class="m-r-15">
                                        <small class="text-black">
                                            <small class="text-blue">
                                                {{ $notification->created_at }}
                                                <small class="ml-lg-5 float-right">
                                                    <a href="#" class="mark-as-read" data-id="{{ $notification->id }}">mark as read</a>
                                                </small>
                                            </small>
                                        </small>

                                    </li>
                                </ul>
                            </div>
                        </a>
                    </li>

                @empty
                  <li class="body ml-2 mt-2">There are no new notifications</li>
                @endforelse
                <li class="footer"><a href="#" id="mark-all"><small>Mark all as read</small></a> </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-flag"></i>
            <div class="notify"><span class="heartbit"></span><span class="point">@if ($tasks->count())
                <span class="badge badge-danger">{{ $tasks->count() }}</span>
            @endif</span></div>

            </a>
            <ul class="dropdown-menu slideUp2">
                <li class="header">Tasks List <small class="float-right"></small></li>
                <li class="body">
                    <ul style="padding: 0px;" class="menu tasks list-unstyled">
                        @forelse ( $tasks as $task )
                            <li style="border-bottom: .5px solid #eee; margin-bottom:0px">
                                <a style="padding-bottom: 0px" href="{{ route('show.ticket',$task->id) }}">
                                    <div style="width: 100%;" class="progress-container progress-primary">

                                        <span ><small class="text-danger text-truncate">{{ $task->title }}</small>
                                        <div class="ml-lg-5 float-right">
                                                @if ($task->status =='open')
                                                <span class="badge badge-primary">{{ $task->status }}</span>

                                                @elseif ($task->status =='in progress')
                                                <span class="badge badge-warning">{{ $task->status }}</span>

                                                @elseif ($task->status =='resolve')
                                                <span class="badge badge-success">{{ $task->status }}</span>

                                                @else
                                                <span class="badge badge-danger">{{ $task->status }}</span>

                                                @endif
                                                @if ($task->priority =='low')
                                                <span class="badge badge-primary">{{ $task->priority }}</span>

                                                @elseif ($task->priority =='medium')
                                                <span class="badge badge-warning">{{ $task->priority }}</span>

                                                @else
                                                <span class="badge badge-danger">{{ $task->priority }}</span>

                                                @endif
                                            </div>
                                        </span>

                                        <ul class="list-unstyled team-info">
                                            <li style=" margin-bottom:0px" class="m-r-15"><small class="text-black">Created by <small class="text-blue">{{ $task->created_by }}</small></small> </li>

                                        </ul>
                                    </div>
                                </a>
                            </li>

                        @empty
                            <li><span class='ml-5 mt-5'>your are tasks empty</span></li>
                        @endforelse ( $tasks as $task)
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="javascript:void(0);" class="js-right-sidebar" title="Setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
        <li><a onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
                href="{{ route('logout') }}" class="mega-menu"
                title="{{ __('LogOut') }}"><i class="zmdi zmdi-power"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>

