@extends('layout.app')
@section('title', 'My Profile')
@section('content')
<div class="row clearfix">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card mcard_3">
            <div class="body">
                <a href="javascript:void(0);"><img src="{{ Auth::user()->image == null ? 'https://ui-avatars.com/api/?color=ff0000&name='.Auth::user()->name : asset('upload/profile/'.Auth::user()->image) }}" class="rounded-circle" alt="profile-image"></a>
                <h4 class="m-t-10">{{Auth::user()->name}}</h4>
                <div class="row">
                    <div class="col-12 mb-4">
                        <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Edit profile picture
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add picture</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ route('update.profile',Auth::user()->id) }}" class="form-group" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="file" name="image" class="form-control" placeholder="add image">
                                                                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>

                    </div>

                    </div>
                </div>
                </div>
                        <ul class="social-links list-unstyled">
                            <li><a href="https://www.facebook.com/thememakkerteam" title="facebook" ><i class="zmdi zmdi-facebook-box"></i></a></li>
                            <li><a href="https://twitter.com/thememakker" title="twitter"><i class="zmdi zmdi-twitter-box"></i></a></li>
                            <li><a href="https://www.instagram.com/thememakker/" title="instagram"><i class="zmdi zmdi-instagram"></i></a></li>
                        </ul>
                        <a href="https://themeforest.net/user/wrraptheme/portfolio" class="btn btn-danger">Delete Profile</a>
                        <a href="https://thememakker.com/" class="btn btn-success">Edit Profile</a>
                    </div>
                    <div class="col-4">
                        <small>Experience</small>
                        <h5>6+ Year</h5>
                    </div>
                    <div class="col-4">
                        <small>Hourly Rate</small>
                        <h5>18$</h5>
                    </div>
                    <div class="col-4">
                        <small>Team</small>
                        <h5>25+</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <small class="text-muted">Reviews: </small>
                <p>
                    <i class="text-warning zmdi zmdi-star"></i>
                    <i class="text-warning zmdi zmdi-star"></i>
                    <i class="text-warning zmdi zmdi-star"></i>
                    <i class="text-warning zmdi zmdi-star"></i>
                    <i class="text-warning zmdi zmdi-star-half"></i>
                </p>
                <hr>
                <small class="text-muted">Email address: </small>
                <p>{{Auth::user()->email}}</p>
                <hr>
                <span>We offer development services in Angular, Laravel, WordPress, React and many other platforms.</span>
                <hr>
                <ul class="list-unstyled">
                    <li>
                        <div>Angular</div>
                        <div class="progress m-b-20">
                            <div class="progress-bar l-blush" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%"> <span class="sr-only">56% Complete</span> </div>
                        </div>
                    </li>
                    <li>
                        <div>Laravel</div>
                        <div class="progress m-b-20">
                            <div class="progress-bar l-purple " role="progressbar" aria-valuenow="91" aria-valuemin="0" aria-valuemax="100" style="width: 91%"> <span class="sr-only">87% Complete</span> </div>
                        </div>
                    </li>
                    <li>
                        <div>Photoshop</div>
                        <div class="progress m-b-20">
                            <div class="progress-bar l-blue " role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%"> <span class="sr-only">62% Complete</span> </div>
                        </div>
                    </li>
                    <li>
                        <div>Wordpress</div>
                        <div class="progress m-b-20">
                            <div class="progress-bar l-green " role="progressbar" aria-valuenow="63" aria-valuemin="0" aria-valuemax="100" style="width: 63%"> <span class="sr-only">87% Complete</span> </div>
                        </div>
                    </li>
                    <li>
                        <div>FrontEnd</div>
                        <div class="progress m-b-20">
                            <div class="progress-bar l-amber" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%"> <span class="sr-only">32% Complete</span> </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@stop
