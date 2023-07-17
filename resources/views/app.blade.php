<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cempaka</title>

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/logout.js') }}"></script>

</body>

</html>
