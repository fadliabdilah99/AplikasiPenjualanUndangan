<html lang="en" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Undangan pernikahan</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/adminlte.min.css">
    <style>
        body {
            padding-top: 3rem;
            padding-bottom: 3rem;
            color: rgb(var(--bs-tertiary-color-rgb));
        }

        .carousel {
            margin-bottom: 4rem;
        }

        .carousel-caption {
            bottom: 3rem;
            z-index: 10;
        }

        .carousel-item {
            height: 32rem;
        }


        .marketing .col-lg-4 p {
            margin-right: .75rem;
            margin-left: .75rem;
        }


        .featurette-divider {
            margin: 5rem 0;

        }


        .featurette-heading {
            letter-spacing: -.05rem;
        }

        @media (min-width: 40em) {

            .carousel-caption p {
                margin-bottom: 1.25rem;
                font-size: 1.25rem;
                line-height: 1.4;
            }

            .featurette-heading {
                font-size: 50px;
            }
        }

        @media (min-width: 62em) {
            .featurette-heading {
                margin-top: 7rem;
            }
        }



        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
</head>

<body>




    <!-- Button trigger modal -->


    @include('home.modal')




    <header data-bs-theme="dark">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Carousel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            @if (Auth::check())
                        <li class="nav-item">
                            <a class="btn btn-secondary" aria-current="page"
                                href="profile/{{ auth()->user()->id }}  ">Undangan anda</a>
                        </li>
                    @else
                    </ul>

                    <a class="btn btn-outline-light mx-1" href="login">Login</a>
                    <a class="btn btn-light mx-1" href="register">Register</a>
                    @endif
                    <div class="d-flex justify-content-end mx-3">

                        {{-- <h1>hello</h1> --}}
                        @if (Auth::check())
                            <a class="btn btn-outline-light" href="logout">LogOut</a>
                            <a href="message" class="text-light"><i class="bi bi-envelope fs-4 px-2"><span
                                        class="text-warning">
                                        @if ($count > 0)
                                            {{ $count }}
                                        @else
                                        @endif
                                    </span></i></a>
                        @endif
                    </div>

                </div>
            </div>
        </nav>
    </header>

    <main>

        <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
                    </svg>
                    <div class="container">
                        <div class="carousel-caption text-start">
                            @if (auth::check())
                                <h1>Hello {{ auth::user()->name }}</h1>
                            @else
                                <h1>Anda belum login, Belum punya akun?</h1>
                                <p><a class="btn btn-lg btn-primary" href="login">Login</a></p>
                            @endif
                            <p class="opacity-75">Some representative placeholder content for the first slide of the
                                carousel.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
                    </svg>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Another example headline.</h1>
                            <p>Some representative placeholder content for the second slide of the carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
                    </svg>
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>One more for good measure.</h1>
                            <p>Some representative placeholder content for the third slide of this carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>



        <div class="container marketing">
            <div class="row">
                <div class="col-lg-4">
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
                    </svg>
                    <h2 class="fw-normal">Heading</h2>
                    <p>Some representative placeholder content for the three columns of text below the carousel. This is
                        the first column.</p>
                    <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
                    </svg>
                    <h2 class="fw-normal">Heading</h2>
                    <p>Another exciting bit of representative placeholder content. This time, we've moved on to the
                        second column.</p>
                    <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
                    </svg>
                    <h2 class="fw-normal">Heading</h2>
                    <p>And lastly this, the third column of representative placeholder content.</p>
                    <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->






            <!-- START THE FEATURETTES -->
            @foreach ($produk as $item)
                <hr class="featurette-divider">
                <div class="row featurette">
                    <div class="col-md-7 <?php if ($item->id % 2 == 0) {
                        echo 'order-md-2';
                    } ?> ">
                        <h2 class="featurette-heading fw-normal lh-1">{{ $item->nama }} <span
                                class="text-body-secondary">It’ll
                                blow
                                your mind.</span></h2>
                        <p class="lead">{{ $item->keterangan }}.</p>
                        <div class="d-flex">
                            <p><a class="btn btn-secondary m-1" href="{{ $item->link }}">View details &raquo;</a>
                            </p>
                            @if (Auth::check())
                                <p><button type="button" class="btn bg-success m-1 text-light"
                                        data-bs-toggle="modal" data-bs-target="#buy{{ $item->link }}">
                                        Buy Now
                                    </button></p>
                            @else
                                <p>
                                    <button class="btn bg-success m-1 text-light delete-data" type="button">
                                        Buy Now
                                    </button>
                                </p>
                            @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                            width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img"
                            aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="var(--bs-secondary-bg)" /><text x="50%" y="50%"
                                fill="var(--bs-secondary-color)" dy=".3em">500x500</text>
                        </svg>
                    </div>

                </div>

                {{-- <hr class="featurette-divider"> --}}
            @endforeach



            <hr class="featurette-divider">


            <div class="container">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Buat laporan</h1>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->
                    <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded-4  bg-dark">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <!-- Content for desktop and tablet -->
                                <div class="col-md-5">
                                    <div class="text-center">
                                        <h2>Undangan <strong>Hesoyam</strong></h2>
                                        <p class="lead mb-5">
                                            Cianjur jawa barat<br>
                                            whatsapp: 081220786387
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <form action="report" method="POST">
                                        @csrf
                                        @if (Auth::check())
                                            <input hidden type="email" name="send"
                                                value="{{ Auth::user()->email }}">
                                            <input type="email" name="to" value="admin@admin.com" hidden>
                                            <div class="form-group">
                                                <label for="inputName">Dari</label>
                                                <input type="text" id="inputName" class="form-control"
                                                    value="{{ Auth::user()->email }}" disabled>
                                            </div>
                                        @endif


                                        <div class="form-group">
                                            <label for="inputEmail">Kepada</label>
                                            <input type="email" id="inputEmail" class="form-control"
                                                value="admin@admin.com" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputSubject">Id Undangan<button
                                                    class="btn text-light alert-report" type="button">
                                                    <i class="text-info bi bi-info-circle"></i>
                                                </button></label>

                                            <input type="text" id="inputSubject" class="form-control"
                                                name="title" value="0">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputMessage">Pesan</label>
                                            <textarea id="inputMessage" class="form-control" name="message" rows="4"></textarea>
                                        </div>
                                        <div class="form-group d-flex ">
                                            @if (Auth::check())
                                                <p><button type="submit" class="btn bg-success m-1 text-light"
                                                        data-bs-toggle="modal">
                                                        Kirim Pengaduan
                                                    </button></p>
                                            @else
                                                <p>
                                                    <button class="btn bg-success m-1 text-light delete-data"
                                                        type="button">
                                                        Kirim pengaduan
                                                    </button>
                                                </p>
                                            @endif
                                            <div class="sosmed d-flex">
                                                <a href=""><i
                                                        class="bi bi-whatsapp px-2 fs-2 text-green"></i></a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section><!-- /.content -->
            </div>
        </div><!-- /.container -->
        <!-- FOOTER -->
        <footer class="container">
            <p class="float-end"><a href="#">Back to top</a></p>
            <p>&copy; 2017–2024 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a
                    href="#">Terms</a></p>
        </footer>
    </main>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        console.log('delete')
        $('.delete-data').click(function(e) {
            e.preventDefault();
            const data = $(this).closest('.featurette').find('h2').text();
            Swal.fire({
                title: 'Peringatan!',
                text: `anda belum Login, tidak bisa mengakses fitur tersebut.`,
                icon: 'info',
                confirmButtonText: 'OK',
                focusConfirm: false
            });
        });
    </script>


    <script>
        console.log('delete')
        $('.alert-report').click(function(e) {
            e.preventDefault();
            const data = $(this).closest('.featurette').find('h2').text();
            Swal.fire({
                title: 'Informasi',
                text: `Apabila anda ingin melaporkan undangan tertentu maka isi id undangan sesuai yang di halaman undangan anda, selain dari melaporkan undangan maka isi id undangan dengan 0.`,
                icon: 'info',
                confirmButtonText: 'OK',
                focusConfirm: false
            });
        });
    </script>


    <script>
        // Periksa apakah terdapat notifikasi sukses dari sesi
        const successNotification = '{{ session('success') }}';

        // Fungsi untuk menampilkan notifikasi
        function showNotification(message) {
            Swal.fire({
                title: 'Sukses!',
                text: message,
                icon: 'success',
                confirmButtonText: 'OK',
                focusConfirm: false
            });
        }

        // Periksa apakah terdapat notifikasi sukses dari sesi
        $(document).ready(function() {
            if (successNotification) {
                showNotification(successNotification);
            }
        });
    </script>

    <script>
        // Periksa apakah terdapat notifikasi error dari sesi
        const errorNotification = '{{ $errors->any() }}';

        // Fungsi untuk menampilkan notifikasi
        function showErrorNotification(message) {
            Swal.fire({
                title: 'Error!',
                text: 'Terdapat kesalahan saat menginput data',
                icon: 'error',
                confirmButtonText: 'OK',
                focusConfirm: false
            });
        }

        // Periksa apakah terdapat notifikasi error dari sesi
        $(document).ready(function() {
            if (errorNotification) {
                showErrorNotification(errorNotification);
            }
        });
    </script>

    <script src="{{ asset('assets') }}/dist/js/adminlte.min.js"></script>



</body>

</html>
