<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ "PCMaker" }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ "PCMaker" }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <div class="vr bg-white mx-2 d-none d-lg-block"></div>
                        @guest
                        <a class="nav-link active" href="{{ route('login') }}">Login</a>
                        <a class="nav-link active" href="{{ route('register') }}">Register</a>
                        <a class="nav-link active" href="{{ route('product.index') }}">Products</a> 
                        <a class="nav-link active" href="{{ route('cart.index') }}">Cart</a>
                        <a class="nav-link active" href="{{ route('home.index') }}">Home</a>
                        
                        @else
                        <a class="nav-link active" href="{{ route('product.index') }}">Products</a> 
                        <a class="nav-link active" href="{{ route('cart.index') }}">Cart</a>
                        <a class="nav-link active" href="{{ route('home.index') }}">Home</a>
                        <a class="nav-link active" href="{{ route('myaccount.orders') }}">My Orders</a> 
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
    </div>
</body>

</html>

<!-- <!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Basic-icons.css">
</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="54">
    <nav class="navbar navbar-expand-lg fixed-top bg-dark navbar-dark" id="mainNav">
        <div class="container"><a class="navbar-brand" href="#page-top"><span style="color: rgb(229, 188, 49);">PCMaker</span></a><button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto text-uppercase">
                    <li class="nav-item"><a class="nav-link" href="#services">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">products</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">cart</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">home</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead" style="background-image: url('assets/img/pc-gamer.webp');">
        <div class="container">
            <div class="intro-text" style="padding-top: 120px;padding-bottom: 25px;">
                <div class="intro-lead-in"><span class="text-center"><strong><span style="color: rgb(229, 188, 49);">Welcome To PCMaker.</span></strong></span></div>
                <div class="intro-heading text-uppercase"><span class="fs-1 text-center"><span style="color: rgb(229, 188, 49);">This is the first step to start in the world of technology!</span></span></div><a class="btn btn-primary btn-xl text-uppercase" role="button" href="#services" style="/*border-bottom-color: var(--bs-info-text-emphasis);*//*background-color: var(--bs-info-text-emphasis);*//*border-color: var(--bs-info-text-emphasis);*//*accent-color: var(--bs-info-text-emphasis);*/">take a look!</a>
            </div>
        </div>
    </header>
    <section id="services" style="padding-top: 14px;padding-bottom: 0px;margin: 0px;margin-bottom: -2px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading">Services</h2>
                    <h3 class="text-center text-muted section-subheading">Sales of laptops, desktop computers and computer components, all under the advice of professionals.</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4 col-lg-12"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i></span>
                    <h3 class="text-center text-muted section-subheading"><span style="color: rgb(33, 37, 41);">If you want a powerful computer. PCMaker is your best choice.</span></h3>
                </div>
            </div>
        </div>
    </section>
    <section id="about" style="padding-top: 0px;padding-bottom: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase">About</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="text-muted">We are dedicated to offering a specialized selection of technology products, including laptops, desktop computers, and various components such as graphics accelerators, RAM cards, and hard drives. Our main focus lies on customization, seeking to provide tailored technological solutions that satisfy both individual and corporate demands in the field of computing.<br><br>We address a wide spectrum of clients, from enthusiastic gamers to entrepreneurs and computer development professionals. To ensure we fully understand each client's needs, we conduct personal interviews, allowing us to gain insight into your requirements and provide accurate recommendations. We are committed to offering high quality products with guaranteed durability, ensuring the full satisfaction of our customers.<br><br>Our goal is to stand out as the most efficient online store in the field of technology, providing our customers with significant advantages compared to the current computer market. Unlike many other stores, we distinguish ourselves with our personalized approach and expert advice. We recognize that people often do not receive adequate guidance when purchasing a new computer, and it is precisely this differentiator that drives us to grow as a team and help our customers make informed and satisfactory decisions when choosing a new computer or components.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-light" id="team" style="padding: 0;">
        <h1 class="text-center">OUR TEAM</h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-lg-12">
                    <div class="text-center text-sm-center text-lg-center text-xl-center text-xxl-center team-member"><img class="rounded-circle mx-auto" src="assets/img/team/Captura%20de%20pantalla%202023-10-30%20170948.png">
                        <h4>Holmer Ortega.</h4>
                        <p class="text-muted">Developer.</p>
                    </div>
                </div>
                <div class="col-sm-4 col-lg-12">
                    <div class="text-center text-sm-center text-md-center text-lg-center text-xl-center text-xxl-center team-member"><img class="rounded-circle mx-auto" src="assets/img/team/Captura%20de%20pantalla%202023-10-30%20171011.png">
                        <h4>Samuel Salazar.</h4>
                        <p class="text-muted">Developer.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5" style="padding: 0px;"></section>
    <section id="contact" style="background-image: url('assets/img/map-image.png');padding: 0px;">
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
                                <p class="text-center text-sm-center text-md-center text-lg-center text-xl-center text-xxl-center"><span style="color: rgb(255, 255, 255);">hortegag@eafit.edu.co - Holmer Ortega - Developer</span></p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-center text-sm-center text-md-center text-lg-center text-xl-center text-xxl-center"><span style="color: rgb(255, 255, 255);">ssalazar1@eafit.edu.co - Samuel Salazar - Developer</span></p>
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
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/agency.js"></script>
</body>

</html> -->