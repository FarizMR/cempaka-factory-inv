<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cempaka</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    @vite(['./resources/css/app.css', './resources/js/app.js'])
    @vite(['./resources/css/custom.css'])
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>Cempaka</b>Inv
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg"><b>Masuk</b></p>
                <div id="div-message">

                </div>
                <form id="login-form" action="#" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="username" name="username" type="text" class="form-control" placeholder="Username" autofocus autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                        </div>

                        <div class="col-4">
                            <button id="submit-button" type="submit" class="btn btn-primary btn-block">Log In</button>
                        </div>

                    </div>
                </form>

            </div>

        </div>
    </div>


    {{-- <script src="../../plugins/jquery/jquery.min.js"></script>

    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../../dist/js/adminlte.min.js?v=3.2.0"></script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/login.js') }}"></script>
</body>

</html>