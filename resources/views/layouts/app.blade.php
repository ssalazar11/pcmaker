<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ "PCMaker" }}</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script&amp;display=swap">
    <link rel="stylesheet" href="{{ asset('/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/Login-Form-Basic-icons.css') }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="54">
    <nav class="navbar navbar-expand-lg fixed-top bg-dark navbar-dark" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">
                <span style="color: rgb(229, 188, 49);">PCMaker</span>
            </a>
            <button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav me-auto">

                </ul>
                <ul class="navbar-nav ms-auto text-uppercase">
                    <div class="vr bg-white mx-2 d-none d-lg-block"></div>
                    @guest
                    <a class="nav-link active" href="{{ route('login') }}">Login</a>
                    <a class="nav-link active" href="{{ route('register') }}">Register</a>
                    <a class="nav-link active" href="{{ route('product.index') }}">Products</a> 
                    <a class="nav-link active" href="{{ route('cart.index') }}">Cart</a>
                    <a class="nav-link active" href="{{ route('home.index') }}">Home</a>

                    @else
                    
                        <a class="nav-link active" href="{{ route('home.index') }}">Home</a>
                        <a class="nav-link active" href="{{ route('product.index') }}">Products</a> 
                        <a class="nav-link active" href="{{ route('cart.index') }}">Cart</a>
                        <a class="nav-link active" href="{{ route('myaccount.orders') }}">My Orders</a> 
                        <a class="nav-link active" href="{{ route('interview.index') }}">My Interviews</a> 
                        <form id="logout" action="{{ route('logout') }}" method="POST">
                            <a role="button" class="nav-link active" 
                            onclick="document.getElementById('logout').submit();">Logout</a>
                            @csrf
                        </form>
                        @endguest
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
            @yield('content')
    </main>
    <section id="contact" style="background-image: url('{{ asset('/img/map-image.png') }}');padding: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading">Contact Us</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form id="contactForm" name="contactForm">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-center text-sm-center text-md-center text-lg-center text-xl-center text-xxl-center">
                                    <span style="color: rgb(255, 255, 255);">hortegag@eafit.edu.co - Holmer Ortega - Developer</span>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-center text-sm-center text-md-center text-lg-center text-xl-center text-xxl-center">
                                    <span style="color: rgb(255, 255, 255);">ssalazar1@eafit.edu.co - Samuel Salazar - Developer</span>
                                </p>
                                <div class="form-group mb-3"><small class="form-text text-danger lead"></small></div>
                            </div>
                            <div class="w-100"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer style="padding: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-md-4"><span class="copyright">Copyright&nbsp;© PCMaker 2023</span></div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="#">Terms of Use</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/agency.js') }}"></script>
</body>

</html>
