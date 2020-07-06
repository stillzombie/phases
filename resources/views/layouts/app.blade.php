<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Moonshiner</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="css/app.css" />

    </head>
    <body>

    <div class="h-screen w-screen">
     <!-- Content -->
     <div class="bg-gray-100 flex-grow border-b-2 border-gray-200 sm:border-b-0 ">
                @yield('content')
            </div>
    <div>

    </body>
</html>