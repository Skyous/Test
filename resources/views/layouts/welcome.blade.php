<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Meta title & meta -->
    @meta

    <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> -->
        <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .footer {
                position:fixed;
                width:100%;
                height:20px;
                padding:5px;
                bottom:0px;
                font-size: smaller;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            #colorlib-logo {
                font-size: 24px;
                margin: 0;
                padding: 0;
                text-transform: uppercase;
                font-weight: 600;
              color: #000}
        </style>
        {{--Common App Styles--}}
        {{ Html::style(mix('assets/app/css/app.css')) }}

        {{--Styles--}}
        @yield('styles')

        {{--Head--}}
        @yield('head')
        <!-- Laravel variables for js -->
        @tojs
    </head>
    <body>
        <div class="flex-center position-ref full-height">
                <div class="top-left links">
                  <a href="#" id="colorlib-logo">{{ __('views.welcome.galilea') }}</a>
                </div>
                <div class="top-right links">
                    <a href="#">{{ __('views.welcome.home') }}</a>
                    <a href="#">{{ __('views.welcome.shipping') }}</a>
                    <a href="#">{{ __('views.welcome.rates') }}</a>
                    <a href="#">{{ __('views.welcome.about') }}</a>
                    <a href="{{ route('protection.membership') }}">{{ __('views.welcome.member_area') }}</a>

                    @if (Route::has('login'))
                        @if (!Auth::check())
                            @if(config('auth.users.registration'))
                                <a href="{{ url('/register') }}">{{ __('views.welcome.register') }}</a>
                            @endif
                            <a href="{{ url('/login') }}">{{ __('views.welcome.login') }}</a>
                        @else
                            @if(auth()->user()->hasRole('administrator'))
                                <a href="{{ url('/admin') }}">{{ __('views.welcome.admin') }}</a>
                            @endif
                            <a href="{{ url('/logout') }}">{{ __('views.welcome.logout') }}</a>
                        @endif
                    @endif
                </div>

            <div class="content">
                @yield('content')

            </div>
        </div>
    </body>
</html>
