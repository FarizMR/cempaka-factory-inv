<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>

    @vite(['./resources/css/app.css', './resources/js/app.js'])
    @vite(['./resources/css/custom.css'])
</head>

<body class="hold-transition sidebar-mini">
    <div id="app" class="wrapper">

        @include('layouts.navbar')

        @include('layouts.sidebar')

        <div class="content-wrapper">
            <router-view />
        </div>

        @include('layouts.footer')

    </div>

    <script></script>

</body>

</html>
