<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="{{url('/')}}"><img src="../assets/images/logo.svg" width="25" alt="Aero"><span class="m-l-10">Aero</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="image"><a href="#"><img src="{{ Auth::user()->image == null ? 'https://ui-avatars.com/api/?color=ff0000&name='.Auth::user()->name : asset('upload/profile/'.Auth::user()->image) }}" alt="{{Auth::user()->name}}"></a></div>
                    <div class="detail">
                        <h4>{{Auth::user()->name}}</h4>
                        <small>{{Auth::user()->role}}</small>
                    </div>
                </div>
            </li>
            <li class="{{ Request::segment(1) === 'dashboard' ? 'active open' : null }}"><a href="{{ route('tickets') }}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li class="{{ Request::segment(1) === 'my-profile' ? 'active open' : null }}"><a href="{{ route('profile') }}"><i class="zmdi zmdi-account"></i><span>My Profile</span></a></li>
            <li class="{{ Request::segment(1) === 'project' ? 'active open' : null }}">
                <a href="#" class="menu-toggle"><i class="zmdi zmdi-assignment"></i> <span>Project / Ticket List</span></a>
                <ul class="ml-menu">
                    <li class="{{ Request::segment(2) === 'project-list' ? 'active' : null }}"><a href="{{ route('projects') }}">Project List</a></li>
                    <li class="{{ Request::segment(2) === 'ticket-list' ? 'active' : null }}"><a href="{{ route('tickets') }}">Ticket List</a></li>
                    <li class="{{ Request::segment(2) === 'ticket-detail' ? 'active' : null }}"><a href="">Ticket Detail</a></li>
                </ul>
            </li>
            <li class="{{ Request::segment(1) === 'create-ticket' ? 'active open' : null }}"><a href="{{ route('create.ticket') }}"><i class="fa fa-plus"></i><span>Create Ticket<span class="badge badge-pill badge-success">New</span></span></a></li>
            <li class="{{ Request::segment(1) === 'create-project' ? 'active open' : null }}"><a href="{{ route('create.project') }}"><i class="fa fa-plus"></i><span>Create Project<span class="badge badge-pill badge-success">New</span></span></a></li>
        </ul>
    </div>
</aside>
