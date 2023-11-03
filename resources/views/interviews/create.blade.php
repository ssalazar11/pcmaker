resources/views/interviews/create.blade.php

@extends('layouts.app') 

@section('content')
    <div class="container">
        <h1>Nueva Entrevista</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('interview.store') }}">
            @csrf
            <div class="form-group">
                <label for="questions">Preguntas:</label>
                <textarea name="questions" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Entrevista</button>
        </form>
    </div>
@endsection


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
                    <li class="nav-item"><a class="nav-link" href="#services">products</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">cart</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">my orders</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">my interviews</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead" style="background-image: url('assets/img/pc-gamer.webp');">
        <div class="container">
            <div class="intro-text" style="padding-top: 119px;padding-bottom: 31px;">
                <section class="position-relative py-4 py-xl-5">
                    <div class="container position-relative">
                        <div class="row d-flex justify-content-around">
                            <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                                <div class="card mb-5">
                                    <div class="card-body p-sm-5">
                                        <h2 class="text-center mb-4">Interview</h2>
                                        <form method="post">
                                            <div class="mb-3"></div>
                                            <div class="mb-3"></div>
                                            <div class="mb-3"><textarea class="form-control" id="message-2" name="questions" rows="6" placeholder="questions"></textarea></div>
                                            <div><button class="btn btn-primary d-block w-100" type="submit">Send </button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </header>
    <section id="contact" style="background-image:url('assets/img/map-image.png');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading">Contact Us</h2>
                    <h3 class="text-muted section-subheading">Lorem ipsum dolor sit amet consectetur.</h3>
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
    <footer>
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