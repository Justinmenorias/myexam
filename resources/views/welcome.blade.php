<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Apollo Exam</title>
    </head>
    <body>
       <div id="app">
            <apollo-component></apollo-component>
       </div>
    </body>
    <script src="{{asset('js/app.js')}}"></script>
</html>
