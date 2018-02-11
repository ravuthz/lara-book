<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{!! url('css/app.css') !!}">
</head>
<body>

    @include('layouts.partials.nav', ['user' => Auth::user()])

    <div class="container">
        <div class="col-md-12">
            @yield('layouts.partials.alert')
        </div>

        @yield('content')
    </div>

    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>--}}

    {{--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>--}}

    <script type="text/javascript" src="{!! url('js/app.js') !!}"></script>

</body>
</html>