<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Panel</title>
        @vite('frontend/admin/src/main.ts')
    </head>
    <body>
        <div id="app"></div>
    </body>
</html>
