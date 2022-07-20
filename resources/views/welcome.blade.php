<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Borneos Short Link</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.svg') }}">

        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700&display=swap" rel="stylesheet"> --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- Styles -->
        {{-- <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style> --}}
    </head>
    <body>
        {{-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Borneos Short Link Generator
                </div>
            </div>
        </div> --}}

        {{-- Main Header --}}

        <section class="main-header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="#"><img src="{{ asset('images/linkborneos.svg') }}" width="120" alt="" srcset=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav ">
                            @if (Route::has('login'))
                                    @auth
                                        <a href="{{ url('/home') }}" class="btn btn-outline-primary">Dashboard</a>
                                    @else
                                        <li class="nav-item">
                                            <a href="{{ route('login') }}" class="nav-link mx-3 text-dark">Login</a>
                                        </li>
                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a href="{{ route('register') }}" class="nav-link btn btn-primary text-white px-3 rounded-pill">Register</a>
                                            </li>
                                        @endif
                                    @endauth
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container">

                <div class="row">
                    @if (Route::has('login'))
                        @auth
                            @if ($posts == 0)
                                <div class="col-lg-6 main-header-left d-flex flex-column justify-content-center">
                                    <h1>Personal Link dan Shortlink gratis untuk kebutuhanmu</h1>
                                    <p>Buat Personal Link mu disini</p>

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form action="{{ route('landing.store') }}" method="POST">
                                        @csrf
                                        <div class="input-group">
                                            <span class="input-group-text" id="addon-wrapping">https://borneos.link/</span>
                                            <input type="text" name="prefix" id="prefixLanding" class="form-control" placeholder="linkanda" aria-label="link" aria-describedby="addon-wrapping" required>

                                            <button type="submit" class="btn btn-primary">Buat Link</button>
                                        </div>
                                    </form>
                                    <button type="button" class="btn btn-outline-primary my-3" id="checkPrefixLanding" onclick="checkPrefixLanding()">
                                        Cek Ketersediaan Link
                                    </button>
                                    <p class="notice"></p>
                                </div>
                                <div class="col-lg-6 main-header-left">
                                    <img src="{{ asset('images/share-link-rafiki.svg') }}" alt="" srcset="">
                                </div>
                                @else
                                    <div class="col-lg-6 main-header-left d-flex flex-column justify-content-center">
                                        <h1>Personal Link gratis untuk kebutuhanmu</h1>

                                        <a href="{{ route('dashboard-landing') }}" class="btn btn-primary"> Masuk ke dashboard untuk kustomisasi</a>
                                        <p class="notice"></p>
                                    </div>
                                    <div class="col-lg-6 main-header-left">
                                        <img src="{{ asset('images/share-link-rafiki.svg') }}" alt="" srcset="">
                                    </div>

                            @endif


                            @else
                                <div class="col-lg-6 main-header-left d-flex flex-column justify-content-center">
                                    <h1>Personal Link dan Shortlink gratis untuk kebutuhanmu</h1>
                                    <p>Buat linkmu disini</p>
                                    <form action="{{ route('login') }}">
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" style="border-top-right-radius: 0;
                                            border-bottom-right-radius: 0; " id="addon-wrapping">https://borneos.link/</span>
                                            <input type="text" class="form-control" placeholder="linkanda" aria-label="link" aria-describedby="addon-wrapping" autocomplete="off">
                                        </div>
                                        <button type="submit" class="btn btn-primary my-3 btn-block">Buat Link</button>
                                    </form>
                                </div>
                                <div class="col-lg-6 main-header-left">
                                    <img src="{{ asset('images/share-link-rafiki.svg') }}" alt="" srcset="">
                                </div>
                        @endauth

                    @endif
                </div>
            </div>
        </section>

        {{-- End of Main Header --}}

        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

        <script src="{{ asset('js/check-prefix-landing.js') }}"></script>
    </body>
</html>
