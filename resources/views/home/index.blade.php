<!DOCTYPE HTML>
<!--
 Helios by HTML5 UP
 html5up.net | @ajlkn
 Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>ULFAVIA</title>
    <link rel="icon" href="{{ asset('images/ulfavialogo.png')}}" type="image/png">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{{ asset('assets-home') }}/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="{{ asset('assets-home') }}/css/noscript.css" />
    </noscript>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/adminlte.min.css">


</head>

<body class="homepage is-preload">
    <div id="page-wrapper">

        <!-- Header -->
        <div id="header">

            <!-- Inner -->
            <div class="inner">
                <header>
                    <div class="typing-container">
                        <span id="typing-text" class="fs-1"></span>
                        <h1 class="cursor">.
                        </h1>
                        <div id="text-data"
                            data-texts='[
                            @if (Auth::check()) "Hallo {{ Auth::user()->name }}",
                            @else
                            "Yuk Buat Akun", @endif
                            "Solusi Undangan Anda."]'
                            style="display: none;">
                        </div>
                    </div>
                    <hr />
                    <p>Web wedding invitation Generator</p>
                </header>
                <footer>
                    <a href="#banner" class="button circled">Start</a>
                </footer>
            </div>

            <!-- Nav -->
            <nav id="nav">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    @if (Auth::check())
                        <li><a href="message">message</a></li>
                        <li><a href="profile/{{ auth()->user()->id }}">Undangan Anda</a></li>
                        <li><a href="logout">LogOut</a></li>
                    @else
                        <li><a href="#" class="delete-data">message</a></li>
                        <li><a href="login">LogIn</a></li>
                        <li><a href="register">Register</a></li>
                    @endif
                </ul>
            </nav>

        </div>

        <!-- Banner -->
        <section id="banner">
            <header>
                <h2>Temukan keindahan setiap titik cahaya di <strong>ULFAVIA</strong>.</h2>
                <p>
                    Diskon 50% untuk kamu pemgguna baru <a href="http://html5up.net">ketentuan berlaku</a>. <br>
                    Cek undangan yang lagi diskon yuuu <a href="http://html5up.net/license">disini</a>
                </p>
                <a href="profile/{{ auth()->user()->id }}" class="btn btn-outline-secondary justify-content-center mt-5">Undangan Anda</a>
            </header>
        </section>

        <!-- Carousel -->
        <section class="carousel">
            <div class="reel">
                @foreach ($produk as $prod)
                    <article>
                        <a href="{{ $prod->link }}" class="image featured"><img
                                src="{{ asset('prod-image/' . $prod->foto) }}" alt="" /></a>
                        <header>
                            <h3><a href="#">{{ $prod->nama }}</a></h3>
                        </header>

                        <p class="text-start">{{ $prod->keterangan }}</p>
                        @if (Auth::check())
                            <p><button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                    data-bs-target="#buy{{ $prod->link }}">
                                    Buy Now
                                </button></p>
                        @else
                            <p>
                                <button class="btn btn-outline-success delete-data" type="button">
                                    Buy Now
                                </button>
                            </p>
                        @endif
                    </article>
                @endforeach
                <article>
                    <a href="#" class="image featured"><img src="images/pic01.jpg" alt="" /></a>
                    <header>
                        <h3><a href="#">coming <br> soon</a></h3>
                    </header>
                    <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                </article>

                <article>
                    <a href="#" class="image featured"><img src="images/pic02.jpg" alt="" /></a>
                    <header>
                        <h3><a href="#">coming <br> soon</a></h3>
                    </header>
                    <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                </article>

                <article>
                    <a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
                    <header>
                        <h3><a href="#">coming <br> soon</a></h3>
                    </header>
                    <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                </article>

                <article>
                    <a href="#" class="image featured"><img src="images/pic04.jpg" alt="" /></a>
                    <header>
                        <h3><a href="#">coming <br> soon</a></h3>
                    </header>
                    <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                </article>

                <article>
                    <a href="#" class="image featured"><img src="images/pic05.jpg" alt="" /></a>
                    <header>
                        <h3><a href="#">coming <br> soon</a></h3>
                    </header>
                    <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                </article>

                <article>
                    <a href="#" class="image featured"><img src="images/pic01.jpg" alt="" /></a>
                    <header>
                        <h3><a href="#">coming <br> soon</a></h3>
                    </header>
                    <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                </article>

                <article>
                    <a href="#" class="image featured"><img src="images/pic02.jpg" alt="" /></a>
                    <header>
                        <h3><a href="#">coming <br> soon</a></h3>
                    </header>
                    <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                </article>

                <article>
                    <a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
                    <header>
                        <h3><a href="#">coming <br> soon</a></h3>
                    </header>
                    <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                </article>

                <article>
                    <a href="#" class="image featured"><img src="images/pic04.jpg" alt="" /></a>
                    <header>
                        <h3><a href="#">coming <br> soon</a></h3>
                    </header>
                    <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                </article>

                <article>
                    <a href="#" class="image featured"><img src="images/pic05.jpg" alt="" /></a>
                    <header>
                        <h3><a href="#">coming <br> soon</a></h3>
                    </header>
                    <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                </article>

            </div>
        </section>

        <!-- Main -->
        <div class="style2">
            <article id="main" class="container special">
                <a href="#" class="image featured"><img src="images/pic06.jpg" alt="" /></a>
                <header>
                    <h2><a href="#">Buat laporan/pengaduan</a></h2>
                    <p>
                        buat laporan atau pengaduan anda untuk menyelesaikan masalah anda, tunggu respon 1x24 jam.
                    </p>
                </header>
                <div class="container">
                    <!-- Main content -->
                    <section class="content">
                        <!-- Default box -->
                        <div class="card shadow-lg p-3 mb-5 rounded-4">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <!-- Content for desktop and tablet -->
                                    <div class="col-md-5">
                                        <div class="text-center">
                                            <h2>Undangan <strong>Hesoyam</strong></h2>
                                            <p class="lead mb-5 text-center">
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
                                            <div class="form-group d-flex mt-3">
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
                                                    <a href="" style="text-decoration: none; color: green"><i
                                                            class="bi bi-whatsapp px-2 fs-2"></i></a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section><!-- /.content -->
                </div>
            </article>

        </div>

        <!-- Features -->
        <div class="wrapper style1">

            <section id="features" class="container special">
                <header>
                    <h2>Morbi ullamcorper et varius leo lacus</h2>
                    <p>Ipsum volutpat consectetur orci metus consequat imperdiet duis integer semper magna.</p>
                </header>
                <div class="row">
                    <article class="col-4 col-12-mobile special">
                        <a href="#" class="image featured"><img src="images/pic07.jpg" alt="" /></a>
                        <header>
                            <h3><a href="#">Gravida aliquam penatibus</a></h3>
                        </header>
                        <p>
                            Amet nullam fringilla nibh nulla convallis tique ante proin sociis accumsan lobortis. Auctor
                            etiam
                            porttitor phasellus tempus cubilia ultrices tempor sagittis. Nisl fermentum consequat
                            integer interdum.
                        </p>
                    </article>
                    <article class="col-4 col-12-mobile special">
                        <a href="#" class="image featured"><img src="images/pic08.jpg" alt="" /></a>
                        <header>
                            <h3><a href="#">Sed quis rhoncus placerat</a></h3>
                        </header>
                        <p>
                            Amet nullam fringilla nibh nulla convallis tique ante proin sociis accumsan lobortis. Auctor
                            etiam
                            porttitor phasellus tempus cubilia ultrices tempor sagittis. Nisl fermentum consequat
                            integer interdum.
                        </p>
                    </article>
                    <article class="col-4 col-12-mobile special">
                        <a href="#" class="image featured"><img src="images/pic09.jpg" alt="" /></a>
                        <header>
                            <h3><a href="#">Magna laoreet et aliquam</a></h3>
                        </header>
                        <p>
                            Amet nullam fringilla nibh nulla convallis tique ante proin sociis accumsan lobortis. Auctor
                            etiam
                            porttitor phasellus tempus cubilia ultrices tempor sagittis. Nisl fermentum consequat
                            integer interdum.
                        </p>
                    </article>
                </div>
            </section>

        </div>

        <!-- Footer -->
        <div id="footer">
            <div class="container">
                <div class="row">

                    <!-- Tweets -->
                    <section class="col-4 col-12-mobile">
                        <header>
                            <h2 class="icon brands fa-twitter circled"><span class="label">Tweets</span></h2>
                        </header>
                        <ul class="divided">
                            <li>
                                <article class="tweet">
                                    Amet nullam fringilla nibh nulla convallis tique ante sociis accumsan.
                                    <span class="timestamp">5 minutes ago</span>
                                </article>
                            </li>
                            <li>
                                <article class="tweet">
                                    Hendrerit rutrum quisque.
                                    <span class="timestamp">30 minutes ago</span>
                                </article>
                            </li>
                            <li>
                                <article class="tweet">
                                    Curabitur donec nulla massa laoreet nibh. Lorem praesent montes.
                                    <span class="timestamp">3 hours ago</span>
                                </article>
                            </li>
                            <li>
                                <article class="tweet">
                                    Lacus natoque cras rhoncus curae dignissim ultricies. Convallis orci aliquet.
                                    <span class="timestamp">5 hours ago</span>
                                </article>
                            </li>
                        </ul>
                    </section>

                    <!-- Posts -->
                    <section class="col-4 col-12-mobile">
                        <header>
                            <h2 class="icon solid fa-file circled"><span class="label">Posts</span></h2>
                        </header>
                        <ul class="divided">
                            <li>
                                <article class="post stub">
                                    <header>
                                        <h3><a href="#">Nisl fermentum integer</a></h3>
                                    </header>
                                    <span class="timestamp">3 hours ago</span>
                                </article>
                            </li>
                            <li>
                                <article class="post stub">
                                    <header>
                                        <h3><a href="#">Phasellus portitor lorem</a></h3>
                                    </header>
                                    <span class="timestamp">6 hours ago</span>
                                </article>
                            </li>
                            <li>
                                <article class="post stub">
                                    <header>
                                        <h3><a href="#">Magna tempus consequat</a></h3>
                                    </header>
                                    <span class="timestamp">Yesterday</span>
                                </article>
                            </li>
                            <li>
                                <article class="post stub">
                                    <header>
                                        <h3><a href="#">Feugiat lorem ipsum</a></h3>
                                    </header>
                                    <span class="timestamp">2 days ago</span>
                                </article>
                            </li>
                        </ul>
                    </section>

                    <!-- Photos -->
                    <section class="col-4 col-12-mobile">
                        <header>
                            <h2 class="icon solid fa-camera circled"><span class="label">Photos</span></h2>
                        </header>
                        <div class="row gtr-25">
                            <div class="col-6">
                                <a href="#" class="image fit"><img src="images/pic10.jpg"
                                        alt="" /></a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="image fit"><img src="images/pic11.jpg"
                                        alt="" /></a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="image fit"><img src="images/pic12.jpg"
                                        alt="" /></a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="image fit"><img src="images/pic13.jpg"
                                        alt="" /></a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="image fit"><img src="images/pic14.jpg"
                                        alt="" /></a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="image fit"><img src="images/pic15.jpg"
                                        alt="" /></a>
                            </div>
                        </div>
                    </section>

                </div>
                <hr />
                <div class="row">
                    <div class="col-12">

                        <!-- Contact -->
                        <section class="contact">
                            <header>
                                <h3>Nisl turpis nascetur interdum?</h3>
                            </header>
                            <p>Urna nisl non quis interdum mus ornare ridiculus egestas ridiculus lobortis vivamus
                                tempor aliquet.</p>
                            <ul class="icons">
                                <li><a href="#" class="icon brands fa-twitter"><span
                                            class="label">Twitter</span></a></li>
                                <li><a href="#" class="icon brands fa-facebook-f"><span
                                            class="label">Facebook</span></a></li>
                                <li><a href="#" class="icon brands fa-instagram"><span
                                            class="label">Instagram</span></a></li>
                                <li><a href="#" class="icon brands fa-pinterest"><span
                                            class="label">Pinterest</span></a></li>
                                <li><a href="#" class="icon brands fa-dribbble"><span
                                            class="label">Dribbble</span></a></li>
                                <li><a href="#" class="icon brands fa-linkedin-in"><span
                                            class="label">Linkedin</span></a></li>
                            </ul>
                        </section>

                        <!-- Copyright -->
                        <div class="copyright">
                            <ul class="menu">
                                <li>&copy; Untitled. All rights reserved.</li>
                                <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
    @include('home.modal')

    <!-- Scripts -->
    <script src="{{ asset('assets-home') }}/js/jquery.min.js"></script>
    <script src="{{ asset('assets-home') }}/js/jquery.dropotron.min.js"></script>
    <script src="{{ asset('assets-home') }}/js/jquery.scrolly.min.js"></script>
    <script src="{{ asset('assets-home') }}/js/jquery.scrollex.min.js"></script>
    <script src="{{ asset('assets-home') }}/js/browser.min.js"></script>
    <script src="{{ asset('assets-home') }}/js/breakpoints.min.js"></script>
    <script src="{{ asset('assets-home') }}/js/util.js"></script>
    <script src="{{ asset('assets-home') }}/js/main.js"></script>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const textDataElement = document.getElementById("text-data");
            const texts = JSON.parse(textDataElement.getAttribute("data-texts"));

            let currentTextIndex = 0;
            let charIndex = 0;
            const typingSpeed = 150;
            const erasingSpeed = 100;
            const newTextDelay = 2000; // Delay between current and next text

            const typingTextSpan = document.getElementById("typing-text");

            function type() {
                if (charIndex < texts[currentTextIndex].length) {
                    typingTextSpan.textContent += texts[currentTextIndex].charAt(charIndex);
                    charIndex++;
                    setTimeout(type, typingSpeed);
                } else {
                    setTimeout(erase, newTextDelay);
                }
            }

            function erase() {
                if (charIndex > 0) {
                    typingTextSpan.textContent = texts[currentTextIndex].substring(0, charIndex - 1);
                    charIndex--;
                    setTimeout(erase, erasingSpeed);
                } else {
                    currentTextIndex = (currentTextIndex + 1) % texts.length;
                    setTimeout(type, typingSpeed + 1100);
                }
            }

            setTimeout(type, newTextDelay);
        });
    </script>



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
