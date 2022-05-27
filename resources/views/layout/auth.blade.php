<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"> <!-- Favicon-->
        <title>@yield('title') - {{ config('app.name') }}</title>
        <meta name="description" content="@yield('meta_description', config('app.name'))">
        <meta name="author" content="@yield('meta_author', config('app.name'))">
        @yield('meta')


        @stack('before-styles')

        <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
        @stack('after-styles')
    </head>
    <?php
        if (Cookie::has('color_skin')){
             $setting =  Cookie::get('color_skin');
        }else{
            $setting = '';
        }
        $theme = "theme-cyan";
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
            $theme = "theme-blush";
        } else if ($setting == 'blush'){
            $theme = "theme-blush";
        }
    ?>
    <body class="<?= $theme ?>">
    <div class="authentication">
        <div class="container">
            @yield('content')
        </div>
    </div>

        <!-- Scripts -->

        @stack('before-scripts')
        <script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
        <script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script>
        @stack('after-scripts')
        <script src="{{ asset('assets/js/alert.js')}}"></script>
    </body>
</html>
