<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="{{{ URL::asset('favicon.ico') }}}">

    <title>404</title>

    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>




<body class="body-404">
    <div class="error-head"> </div>
    <section class="error-wrapper text-center pageNotFound">
        <h1>
            <img src="{{  URL::asset('images/404.png') }}">
        </h1>
        <div class="error-desk">
            <h2>{{{ trans('message.404_msg') }}}</h2>
        </div>
        @if(Auth::check())
            @if(Auth::user()->authority == $authority['admin'])
                <a href="{{ url('user') }}" class="back-btn"><i class="fa fa-home"></i> {{{ trans('button.back_to_home') }}}</a>
            @elseif(Auth::user()->authority == $authority['client'])
                <a href="{{ url('/') }}" class="back-btn"><i class="fa fa-home"></i> {{{ trans('button.back_to_home') }}}</a>
            @endif
        @else
            <a href="{{ url('login') }}" class="back-btn"><i class="fa fa-home"></i> {{{ trans('button.back_to_home') }}}</a>
        @endif
    </section>
</body>
</html>