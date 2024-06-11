<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $data->pengantin_l }} & {{ $data->pengantin_p }}.decloop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('produk1') }}/style/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Sacramento&family=Work+Sans:wght@100;300;400;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <!-- .countsown -->
    <link rel="stylesheet" href="{{ asset('produk1') }}/countdown/simplyCountdown.theme.default.css" />
    <script src="{{ asset('produk1') }}/countdown/simplyCountdown.min.js"></script>
</head>

<body>
    <section id="hero"
        class="hero w-100 h-100 p-3 mx-auto text-center d-flex justify-content-center align-items-center text-white">
        <main>

            @if (session('success'))
                <div class="alert alert-success w-50 mx-auto position-fixed top-50 start-50 translate-middle"
                    role="alert">
                    <h5>{{ session('success') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger w-50 mx-auto position-fixed top-50 start-50 translate-middle"
                    role="alert">
                    <h5>Gagal menyimpan data</h5>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

                </div>
            @endif

            <h4>Kepada <span>Bapak/ibu/saudara/i </span></h4>
            <h1>{{ $data->pengantin_l }} & {{ $data->pengantin_p }}</h1>
            <p>akan melangsungkan resepsi pernikahan dalam</p>
            <div class="simply-countdown"></div>
            <a href="#home" class="btn btn-lg mt-4" onClick="enabels()">Lihat undangan</a>
        </main>
    </section>
    <nav class="navbar bg-transparent sticky-top navbar-expand-md mynavbar">
        <div class="container">
            <a class="navbar-brand" href="#">Mau Nikah</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Mau Nikah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link" href="#home">Home</a>
                        <a class="nav-link" href="#info">info</a>
                        <a class="nav-link" href="#story">story</a>
                        <a class="nav-link" href="#galery">galery</a>
                        <a class="nav-link" href="#rsvp">RSVP</a>
                        <a class="nav-link" href="#gift">Gift</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <section id="home" class="home">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h4>السلام عليكم ورحمة الله وبركاته</h4>
                    <p>Atas berkah & rahmat Allah Subhanallohu Wata'ala, tanpa mengurangi rasa hormat, kami mengundang
                        bapak/ibu/saudara/i serta kerabat sekalian untuk menghadiri acara pernikahan kami: </p>
                    <h6>Diselenggarakan pada {{ $tanggal }} Di Cianjur</h6>
                </div>
            </div>

            <div class="row couple">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-8 text-end">
                            <h3>{{ $data->pengantin_l }}</h3>
                            <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, excepturi labore perspiciatis eum nam iusto?</p> -->
                            <p>
                                putra dari <br>{{ $data->ortu_l }}
                            </p>
                        </div>
                        <div class="col-4">
                            <img src="{{ route('image.display', $foto_l) }}" alt=""
                                class="img-resposive rounded-circle" />
                        </div>
                    </div>
                </div>
                <span class="heart"><i class="bi bi-heart-fill"></i></span>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ route('image.display', $foto_p) }}" alt=""
                                class="img-resposive rounded-circle" />
                        </div>
                        <div class="col-8">
                            <h3>{{ $data->pengantin_p }}</h3>
                            <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, excepturi labore perspiciatis eum nam iusto?</p> -->
                            <p>
                                putri dari <br>{{ $data->ortu_p }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="info" class="info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md8 col-10 text-center">
                    <h2>informasi acara</h2>
                    <p class="alamat">Alamat : {{ $data->alamat }}</p>
                    <a href="{{ $data->maps }}" target="_blank" class="btn btn-light btn-sm">Klik Untuk Lihat
                        Alamat</a>
                    <p class="description my-4">Dengan memohon rahmat dan ridho Allah SWT, kami bermaksud
                        menyelenggarakan pernikahan kami, yang insya Allah akan di laksanakan pada : </p>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-md-5 col-10 mb-5">
                    <div class="card text-center text-bg-light">
                        <div class="card-header">Akad Nikah</div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <i class="bi bi-clock-history d-block"> </i>
                                    <span>{{ $akad }} s/d selesai</span>
                                </div>
                                <div class="col-md-6">
                                    <i class="bi bi-calendar2-week d-block"></i>
                                    <span>{{ $tanggal }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">Saat Acara di harap tertib selama acara berlangsung</div>
                    </div>
                </div>
                <div class="col-md-5 col-10">
                    <div class="card text-center text-bg-light">
                        <div class="card-header">Resepsi</div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <i class="bi bi-clock-history d-block"> </i>
                                    <span>{{ $resepsi }} s/d selesai </span>
                                </div>
                                <div class="col-md-6">
                                    <i class="bi bi-calendar2-week d-block"></i>
                                    <span>{{ $tanggal }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">Saat Acara di harap tertib selama acara berlangsung</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="story" class="story">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-10 text-center">
                    <span>Story of Love</span>
                    <h2>Cerita Kami</h2>
                    <p>ini cerita kami</p>
                </div>
            </div>
            <div class="row">
                @if ($data->status == 'edit')
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Add Your Story
                    </button>
                @endif
                <div class="col">
                    <ul class="timeline">
                        <?php $no = 0; ?>
                        @foreach ($story as $storys)
                            <?php $no++; ?>
                            <li
                                class="
                            @if ($no % 2 == 0) timeline
                            @else
                                timeline-kanan @endif
                            ">
                                <div class="timeline-img"
                                    style="background: url('{{ route('image.display', $storys->foto) }}'); background-size: cover; width: 100px; height: 100px;">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h3>{{ $storys->title }}</h3>
                                        <span>{{ $storys->tanggal }}</span>
                                    </div>
                                    <div class="timeline-body">
                                        <p>{{ $storys->deskripsi }}</p>
                                    </div>
                                    @if ($data->status == 'edit')
                                        <button class="btn btn-secondary"><i class="bi bi-pencil-square"
                                                data-bs-toggle="modal"
                                                data-bs-target="#edit{{ $storys->id }}">edit</i></button>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="secsion galery" id="galery">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-10 text-center">
                        <span>Story of relationship</span>
                        <h2>My stories</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem est esse vitae veniam libero
                            ducimus optio aperiam, odio vero placeat!</p>
                    </div>
                </div>
                <div class="justify-content-center row row-cols-md-3 row-cols-lg-4 row-cols-sm-2 row-cols-1">
                    @foreach ($album as $albums)
                        <div class="col mt-3">
                            <a href="{{ route('image.display', $albums->foto) }}" data-toggle="lightbox"
                                data-caption="image 2" data-gallery="myfoto">
                                <img src="{{ route('image.display', $albums->foto) }}" alt=""
                                    class="img-fluid w-100 rounded" />
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="p-3 rsvp" id="rsvp">
        <div class="container">
            <form action="{{ url('ucapanpsatu') }}" method="POST">
                @csrf
                <input type="number" name="No" value="{{ $data->No }}" hidden>
                <input type="number" name="undangan_id" value="{{ $data->id }}" hidden>
                <div class="card-body border rounded-4 shadow p-3">
                    <h1 class="font-ucapan" style="font-size: 3rem">
                        Ucapan & Doa
                    </h1>
                    <div class="mb-1" id="balasan"></div>

                    <div class="mb-3">
                        <label for="form-nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control shadow-sm" id="form-nama"
                            placeholder="Isikan Nama Anda" />
                    </div>


                    <div class="mb-3">
                        <label for="form-kehadiran" class="form-label" id="label-kehadiran">Kehadiran</label>
                        <select class="form-select shadow-sm" name="kehadiran" id="form-kehadiran">
                            <option value="0" selected>
                                Konfirmasi Kehadiran
                            </option>
                            <option value="1">Hadir</option>
                            <option value="2">Berhalangan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="form-nama" class="form-label">Nama</label>
                        <textarea name="ucapan" class="form-control shadow-sm" id="form-nama" placeholder="Ucapan Doa"
                            style="height: 100px"></textarea>
                    </div>

                    <div class="d-flex">
                        <button class="flex-fill btn btn-primary btn-sm rounded-3 shadow m-1"
                            onclick="comment.kirim()" id="kirim">
                            Kirim<i class="fa-solid fa-paper-plane ms-1"></i>
                        </button>
                    </div>
                </div>
            </form>
            <div class="container rounded pb-2 my-5 border">
                <h1 class="font-ucapan">ucapan</h1>
                <p class="blockquote-footer mt-1">total ucapan {{ $totalucapan }}</p>
                @foreach ($ucapan as $ucapan)
                    <div class="card mt-3 bg-dark px-5">
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>{{ $ucapan->nama }}</p>
                                <p class="blockquote-footer">{{ $ucapan->ucapan }}</p>
                            </blockquote>
                        </div>
                    </div>
                @endforeach

                @if ($totalucapan > 10)
                    {{ $ucapan->links() }}
                @endif


            </div>
        </div>
    </section>
    <section id="gift" class="gift">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-10 text-center">
                    <span>ungkapan Tanda kasih</span>
                    <h2>Kirim Hadiah</h2>
                    <p>Dengan tulus kami mengucapkan terima kasih atas hadiah dan doa restu yang telah diberikan.
                        Kehadiran dan perhatian Anda sangat berarti bagi kami.</p>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="fw-bold">{{ $namarekening1 }}</div>
                                {{ $rekening1 }}
                            </li>
                            <li class="list-group-item">
                                <div class="fw-bold">{{ $namarekening2 }}</div>
                                {{ $rekening2 }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
    </section>








    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('story/' . $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="No" value="{{ $data->No }}" hidden>
                        <div class="mb-3">
                            <label for="foto" class="form-label">foto 1/1</label>
                            <input type="file" name="foto" class="form-control" id="foto">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="exampleInputEmail1">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal/Tempat</label>
                            <input type="text" class="form-control" name="tanggal" id="tanggal">
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" name="deskripsi" placeholder="Leave a comment here" id="floatingTextarea2"
                                style="height: 100px"></textarea>
                            <label for="floatingTextarea2 fs-6">cerita cintaku</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    @foreach ($story as $edit)
        <!-- Modal edit-->
        <div class="modal fade" id="edit{{ $edit->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('editstory/' . $data->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="No" value="{{ $data->No }}" hidden>
                            <div class="mb-3">
                                <label for="foto" class="form-label"><b>upload ulang</b> foto 1/1</label>
                                <input type="file" name="foto" class="form-control" id="foto">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Title</label>
                                <input type="text" class="form-control" value="{{ $edit->title }}"
                                    name="title" id="exampleInputEmail1">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal/Tempat</label>
                                <input type="text" class="form-control" value="{{ $edit->tanggal }}"
                                    name="tanggal" id="tanggal">
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" name="deskripsi" placeholder="Leave a comment here" id="floatingTextarea2"
                                    style="height: 100px"></textarea>
                                <label for="floatingTextarea2 fs-6">cerita cintaku</label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach





    <footer>
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <small class="block">&copy;2023 wedding<small>
                            <small class="block"><a href="">info developer</a></small>
                </div>
            </div>
        </div>
    </footer>

    <div class="audio-container" id="audio-container">
        <audio id="song" autoplay loop>
            <source src="{{ asset('produk1') }}/audio/audio.mp3" tipe="audio/mp3">
        </audio>
        <div class="audio-icon-wrapper" style="display: none;">
            <i class="bi bi-disc"></i>
        </div>
        <div class="playtombol" style="display: none;">
            <i class="bi bi-play-circle "></i>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
        // Data dari PHP ke JavaScript
        var dateData = {
            year: {{ $tahun }},
            month: {{ $bulan }},
            day: {{ $hari }},
            hours: 0 // Anda bisa tambahkan properti lain sesuai kebutuhan
        };

        simplyCountdown(".simply-countdown", {
            year: dateData.year,
            month: dateData.month,
            day: dateData.day,
            hours: 0,
            words: {
                //words displayed into the countdown
                days: {
                    singular: "Hari",
                    plural: "Hari"
                },
                hours: {
                    singular: "Jam",
                    plural: "Jam"
                },
                minutes: {
                    singular: "menit",
                    plural: "menit"
                },
                seconds: {
                    singular: "detik",
                    plural: "detik"
                },
            },
        });
    </script>
    <script>
        const hamburger = document.querySelector(".navbar-toggler");
        const stickytop = document.querySelector(".sticky-top");
        const offcanvas = document.querySelector(".offcanvas");

        offcanvas.addEventListener("show.bs.offcanvas", function() {
            stickytop.style.overflow = "visible";
        });

        offcanvas.addEventListener("hidden.bs.offcanvas", function() {
            stickytop.style.overflow = "hidden";
        });
    </script>

    <script>
        const rootelement = document.querySelector(":root");
        const audioicon = document.querySelector('.audio-icon-wrapper')
        const audioiconplay = document.querySelector('.playtombol')
        const song = document.querySelector('#song')

        function disable() {
            scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;
            let play = false
            window.onscroll = function() {
                window.scrollTo(scrollTop, scrollLeft);
            };

            rootelement.style.scrollBehavior = "auto";
        }

        function enabels() {
            window.onscroll = function() {};

            rootelement.style.scrollBehavior = "smooth";
            playAudio()

            function playAudio() {
                audioicon.style.display = 'flex'
                song.volume = 0.1;
                song.play()
                play = true


            }

            audioicon.onclick = function() {
                if (play) {
                    audioicon.style.display = 'none'
                    audioiconplay.style.display = 'flex'
                    song.pause()
                    audioiconplay.style.animation = 'none'


                    // }else{
                    //   song.play()

                }
                audioiconplay.onclick = function() {
                    if (play == false) {
                        audioicon.style.display = 'flex'
                        audioiconplay.style.display = 'none'
                        song.play()
                        audioiconplay.style.animation = 'none'

                        // }else{
                        //   song.pause()

                    }

                    play = !play
                }
                // localStorage.setItem("open", "true");
            }
            // if (!localStorage.getItem("open")) {
            //   disable();
            // }
        }
        disable()
    </script>

    <script>
        window.addEventListener("load", function() {
            const form = document.getElementById("my-form");
            form.addEventListener("submit", function(e) {
                e.preventDefault();
                const data = new FormData(form);
                const action = e.target.action;
                fetch(action, {
                    method: "POST",
                    body: data,
                }).then(() => {
                    alert("Berhasil memasukan kehadiran");
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>
    <script>
        const ulrparams = new URLSearchParams(window.location.search)
        const nama = ulrparams.get('nama') || ''
        console.log(nama)
        const pronnoum = ulrparams.get('p') || 'bapak/ibu/saudara/i'

        const namacontainer = document.querySelector('.hero h4 span')
        namacontainer.innerText = `${pronnoum} ${nama},`.replace(/ ,$/, ',');

        document.querySelector('#nama').value = nama;
    </script>
</body>

</html>
