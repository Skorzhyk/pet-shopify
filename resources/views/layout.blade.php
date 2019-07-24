<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Messages</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/message.css') }}" rel="stylesheet"/>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/message.js') }}"></script>
</head>
<body>
    <div class="container">
        <p><br/></p>
        @yield('content')
    </div>
</body>
</html>
