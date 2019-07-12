<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <title>Mage</title>
    </head>
    <body>
        <ul>
            @foreach ($messages as $message)
                <a href="messages/{{$message->id}}">
                    <li>{{$message->first_name}}</li>
                </a>
            @endforeach
        </ul>
    </body>
</html>
