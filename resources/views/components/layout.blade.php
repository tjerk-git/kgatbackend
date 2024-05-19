<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"/>
        <title>{{ $title ?? 'Kijkgat' }}</title>
    </head>
    <body>
        <main class="container">
        {{ $slot }}
        </main> 

        <script src="https://unpkg.com/htmx.org@1.9.12/dist/htmx.js" integrity="sha384-qbtR4rS9RrUMECUWDWM2+YGgN3U4V4ZncZ0BvUcg9FGct0jqXz3PUdVpU1p0yrXS" crossorigin="anonymous"></script>
    </body>
</html>


