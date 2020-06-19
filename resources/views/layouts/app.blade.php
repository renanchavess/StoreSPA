<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> Vue + Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
        
        <link rel="stylesheet" href="{{ asset('site/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    </head>
    <body>

        @yield('content')

        <script src="https://kit.fontawesome.com/eb120e7855.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
