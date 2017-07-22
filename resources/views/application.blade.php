<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{env('APP_NAME')}} | @yield( 'title' )</title>

    <link rel="shortcut icon" href="/img/logo/logo_xs.png" type="image/x-icon">

    <script src="https://use.fontawesome.com/6a91d34f3a.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{url( 'css/vendor.css' )}}">
    <link rel="stylesheet" href="{{url( 'css/app.css' )}}">
</head>

<body class="{{ Route::currentRouteName() }} @yield( 'bodyClass' ) {{env('APP_ENV')}}">

<nav id="primary-nav" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="{{url('/')}}">
            </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                @if(isset( $_links[ 'left' ] ))
                    @foreach( $_links[ 'left' ] as $link )
                        <li class="{!! ViewHelper::set_active($link['href']) !!}@if( isset( $link[ 'class' ] ) ) {!! $link[ 'class' ] !!} @endif">
                            <a href="{{$link['href']}}">{!! $link['label'] !!}</a>
                        </li>
                    @endforeach
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if(isset( $_links[ 'right' ] ))
                    @foreach( $_links[ 'right' ] as $link )
                        <li class="{!! ViewHelper::set_active($link['href']) !!}@if( isset( $link[ 'class' ] ) ) {!! $link[ 'class' ] !!} @endif">
                            <a href="{{$link['href']}}">{!! $link['label'] !!}</a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>

@if( !empty($_links[ 'submenu' ]) )
    <nav id="secondary-nav" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#secondary-navbar"
                        aria-expanded="false" aria-controls="secondary-navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="secondary-navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    @foreach( $_links[ 'submenu' ] as $link )
                        <li class="{!! ViewHelper::set_active($link['href']) !!}@if( isset( $link[ 'class' ] ) ) {!! $link[ 'class' ] !!} @endif">
                            <a href="{{$link['href']}}">{!! $link['label'] !!}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
@endif

<main>
    @yield( 'content' )
</main>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <p>
                    <a href="/terms-of-use">Terms Of Use</a> | <a href="/privacy-policy">Privacy Policy</a>
                </p>
            </div>
            <div class="col-sm-6">
                <p>&copy; {{date('Y')}}</p>
            </div>
        </div>
    </div>
</footer>

<script
    src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{elixir('js/vendor.js')}}"></script>
<script type="text/javascript" src="{{elixir('js/app.js')}}"></script>

{{ csrf_field() }}

@yield( 'scripts' )
</body>
</html>