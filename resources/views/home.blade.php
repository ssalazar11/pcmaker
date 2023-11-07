@extends('layouts.app')

@section('content')
<header class="masthead" style="background-image: url('{{ asset("/img/pc-gamer.webp") }}');">
        <div class="container">
            <div class="intro-text" style="padding-top: 120px;padding-bottom: 25px;">
                <div class="intro-lead-in">
                    <span class="text-center"><strong><span style="color: rgb(229, 188, 49);">Welcome To PCMaker.</span></strong></span>
                </div>
                <div class="intro-heading text-uppercase">
                    <span class="fs-1 text-center"><span style="color: rgb(229, 188, 49);">This is the first step to start in the world of technology!</span></span>
                </div>
                <a class="btn btn-primary btn-xl text-uppercase" role="button" href="{{ route('product.index') }}" style="/*border-bottom-color: var(--bs-info-text-emphasis);*//*background-color: var(--bs-info-text-emphasis);*//*border-color: var(--bs-info-text-emphasis);*//*accent-color: var(--bs-info-text-emphasis);*/">take a look!</a>
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
                <div class="col-md-4 col-lg-12">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                    <h3 class="text-center text-muted section-subheading">
                        <span style="color: rgb(33, 37, 41);">If you want a powerful computer. PCMaker is your best choice.</span>
                    </h3>
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
                    <p class="text-muted">We are dedicated to offering a specialized selection of technology products, including laptops, desktop computers, and various components such as graphics accelerators, RAM cards, and hard drives. Our main focus lies on customization, seeking to provide tailored technological solutions that satisfy both individual and corporate demands in the field of computing.<br><br>We address a wide spectrum of clients, from enthusiastic gamers to entrepreneurs and computer development professionals. To ensure we fully understand each client's needs, we conduct personal interviews, allowing us to gain insight into your requirements and provide accurate recommendations. We are committed to offering high-quality products with guaranteed durability, ensuring the full satisfaction of our customers.<br><br>Our goal is to stand out as the most efficient online store in the field of technology, providing our customers with significant advantages compared to the current computer market. Unlike many other stores, we distinguish ourselves with our personalized approach and expert advice. We recognize that people often do not receive adequate guidance when purchasing a new computer, and it is precisely this differentiator that drives us to grow as a team and help our customers make informed and satisfactory decisions when choosing a new computer or components.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-light" id="team" style="padding: 0;">
        <h1 class="text-center">OUR TEAM</h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-lg-12">
                    <div class="text-center text-sm-center text-lg-center text-xl-center text-xxl-center team-member">
                        <img class="rounded-circle mx-auto" src="{{ asset('/img/team/Captura%20de%20pantalla%202023-10-30%20170948.png') }}">
                        <h4>Holmer Ortega.</h4>
                        <p class="text-muted">Developer.</p>
                    </div>
                </div>
                <div class="col-sm-4 col-lg-12">
                    <div class="text-center text-sm-center text-md-center text-lg-center text-xl-center text-xxl-center team-member">
                        <img class="rounded-circle mx-auto" src="{{ asset('/img/team/Captura%20de%20pantalla%202023-10-30%20171011.png') }}">
                        <h4>Samuel Salazar.</h4>
                        <p class="text-muted">Developer.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
