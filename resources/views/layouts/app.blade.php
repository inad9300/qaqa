<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>qaqa</title>

        <link href="/css/app.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="navbar navbar-dark bg-dark">
            <div class="container justify-content-center">
                <a class="navbar-brand" href="/">qaqa</a>
            </div>
        </div>
        <div class="container my-4">
            @yield('body')
        </div>
    </body>
</html>
