<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon"> <!-- Favicon-->
        <title>{{ config('app.name') }} - @yield('title')</title>
        <meta name="description" content="@yield('meta_description', config('app.name'))">
        <meta name="author" content="@yield('meta_author', config('app.name'))">
        @yield('meta')
        {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
        @stack('before-styles')
        <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
        @if (trim($__env->yieldContent('page-style')))
            @yield('page-style')
        @endif
        <!-- CSS only -->
        <link rel="stylesheet" href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}"/>
        <!-- Custom Css -->
        <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        @stack('after-styles')
    </head>
    <?php

        if (Cookie::has('color_skin')){
             $setting =  Cookie::get('color_skin');
        }else{
            $setting = '';
        }
        $theme = "theme-blush";
        $menu = "";
        if ($setting == 'purple') {
            $theme = "theme-purple";
        } else if ($setting == 'blue') {
            $theme = "theme-blue";
        } else if ($setting == 'green') {
            $theme = "theme-green";
        } else if ($setting == 'orange') {
            $theme = "theme-orange";
        } else if ($setting == 'cyan') {
            $theme = "theme-cyan";
        } else if ($setting == 'blush'){
            $theme = "theme-blush";
        }

        if (Request::segment(2) === 'rtl' ){
            $theme .= " rtl";
        }
    ?>
    <body class="<?= $theme ?>">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img class="zmdi-hc-spin" src="../assets/images/logo.svg" width="48" height="48" alt="Aero"></div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        @include('layout.navbarright')
        @include('layout.sidebar')
        @include('layout.rightsidebar')
        <section class="content">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>@yield('title')</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="zmdi zmdi-home"></i> Aero</a></li>
                            @if (trim($__env->yieldContent('parentPageTitle')))
                                <li class="breadcrumb-item">@yield('parentPageTitle')</li>
                            @endif
                            @if (trim($__env->yieldContent('title')))
                                <li class="breadcrumb-item active">@yield('title')</li>
                            @endif
                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    </div>
                </div>
            </div>
            <div id='notification-container' >
            </div>

            <div class="container-fluid">
                @yield('content')
                @if (session()->has('success'))
                    <div data-notify="container" class="bootstrap-notify-container alert alert-dismissible alert-success animated fadeInDown" role="alert" data-notify-position="bottom-left" style="padding-top: 14px; display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; bottom: 20px; left: 20px;">
                        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="padding-top: 12px; position: absolute; right: 10px; top: 5px; z-index: 1033;">×</button>
                        <span data-notify="icon"></span>
                        <span data-notify="title"></span>
                        <span data-notify="message">{{ session()->get('success') }}</span>
                        <a class='close' href="#" target="_blank" data-notify="url"></a>
                    </div>
                @endif
            </div>
        </section>
        @yield('modal')
        <!-- Scripts -->
        @stack('before-scripts')
        <!-- JavaScript Bundle with Popper -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
        <script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/alert.js')}}"></script>
        <script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
        @stack('after-scripts')
        @if (trim($__env->yieldContent('page-script')))
            @yield('page-script')
		@endif

        <script>

            Echo.private('notify.{{ auth()->id() }}').listen('.ticket-notification',(e) =>{
                $("#notification-container").prepend(`<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible bg-teal animated fadeInDown" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; bottom: 20px; right: 20px;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1033;">×</button><span data-notify="icon"></span> <span data-notify="title"></span> <span data-notify="message">${e.notification_status}</span><a href="#" target="_blank" data-notify="url"></a></div>`);
                // $("#notification-container").css({"opacity":"1"});
            })
        </script>
        <script>
            function sendMarkRequest(id = null) {
                return $.ajax("{{ route('markNotification') }}", {
                    method: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id
                    }
                });
            }
            $(function() {
                $('.mark-as-read').click(function() {
                    let count = document.getElementById("notifCount").textContent;
                    let request = sendMarkRequest($(this).data('id'));
                    request.done(() => {
                        if (count - 1 == 0) {
                            $('#notifCount').remove();
                        } else {
                            $('#notifCount').text(count - 1);
                        }
                        $(this).parents('li.pt-0').remove();
                    });
                });
                $('#mark-all').click(function() {
                    let request = sendMarkRequest();
                    request.done(() => {
                        $('#notifCount').remove();
                        $('li.pt-0').remove();
                    })
                });
            });
        </script>
    </body>
</html>
