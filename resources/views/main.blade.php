<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/fav.png">

    <title>DevelopersHangout</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap-dark.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">

    <![endif]-->
</head>

    <body>

        @include('nav')

        <div class="container">
            @yield('content')
        </div>

        @include('footer')

    </body>
</html>
