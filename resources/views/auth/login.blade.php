<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login-form-1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login-form.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Pretty-Registration-Form.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Responsive-Form-1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Responsive-Form.css') }}">
</head>

<body id="page-top">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-secondary text-uppercase" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <img class="img-fluid" src="{{ asset('assets/img/Logo%20Klinik%20Berkah%20fix.jpg') }}" style="width: 50px;height: 50px;margin: 5px;">
                Klinik Berkah Abadi Medika
            </a>
            <button data-toggle="collapse" data-target="#navbarResponsive"
                class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
        </div>
    </nav>
    <section id="portfolio" class="portfolio">
        <div class="container full-height">
            <div class="row register-form">
                <div class="col">
                    <form method="POST" action="{{ route('login') }}" class="custom-form" style="background-color: rgb(249,247,247);margin-right: 250px;margin-left: 250px;margin-top: 40px;">
                        @csrf
                        <img class="img-fluid" src="{{ asset('assets/img/Logo%20Klinik%20Berkah%20fix.jpg') }}" style="width: 50px;height: 50px;margin: 5px;">
                        <h1>Login</h1>
                        @if($errors->has('username'))
                            <span class="badge badge-danger mt-2">Login gagal, Username atau Password Salah.</span>
                            <br>
                        @endif
                        <div class="form-row form-group">
                            <div class="col-sm-4 label-column">
                                <label class="col-form-label" for="email-input-field">Username</label>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input class="form-control" type="text" id="username" name="username" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                    Please fill in your username
                                </div>
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="pawssword-input-field">Password </label></div>
                            <div class="col-sm-6 input-column">
                                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                <div class="invalid-feedback">
                                    please fill in your password
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-light submit-button tabindex="4">
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Location</h4>
                    <p>Jalan Kampung<br>Melayu Ruko Arcadia Square Blok B Nomor 12, Teluknaga, Tangerang.<br></p>
                </div>
                <div class="col-md-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase">Around the Web</h4>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a class="btn btn-outline-light btn-social text-center rounded-circle" role="button" href="#"><i class="fa fa-facebook fa-fw"></i></a></li>
                        <li class="list-inline-item"><a class="btn btn-outline-light btn-social text-center rounded-circle" role="button" href="#"><i class="fa fa-google-plus fa-fw"></i></a></li>
                        <li class="list-inline-item"><a class="btn btn-outline-light btn-social text-center rounded-circle" role="button" href="#"><i class="fa fa-twitter fa-fw"></i></a></li>
                        <li class="list-inline-item"><a class="btn btn-outline-light btn-social text-center rounded-circle" role="button" href="#"><i class="fa fa-dribbble fa-fw"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4 class="text-uppercase mb-4">About Freelancer</h4>
                    <p class="lead mb-0"><span>Freelance is a free to use, open source Bootstrap theme.&nbsp;</span></p>
                </div>
            </div>
        </div>
    </footer>
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright ©&nbsp;Brand 2018</small></div>
    </div>
    <div class="d-lg-none scroll-to-top position-fixed rounded"><a class="d-block js-scroll-trigger text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a></div>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="{{ asset('assets/js/freelancer.js') }}"></script>
</body>

</html>