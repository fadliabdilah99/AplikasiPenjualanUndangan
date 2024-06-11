<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buku undangan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis  bg-body-secondary" style="height:100vh;">
        <div
            class="p-4 p-md-5 mb-4 rounded text-body-emphasis  bg-body-secondary d-flex justify-content-center text-center">
            <div class="col-lg-6 px-0">
                <h1 class="display-6  fw-bold fst-italic">Laporan Buku Undangan Tamu</h1>
                <h3 class="my-5 ">{{ $pengantin->pengantin_l }}<i
                        class="bi bi-balloon-heart-fill text-danger"></i>{{ $pengantin->pengantin_p }}</h3>
            </div>
        </div>
        <div class="container pt-5 ">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon "><i class="bi bi-person-fill-check text-success"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Tamu Yang Hadir</span>
                            <span class="info-box-number">{{ $tamuH }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon "><i class="bi bi-person-fill-x text-danger"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Tamu Yang Berhalangan</span>
                            <span class="info-box-number">{{ $tamuTH }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                    <a href="#daftar-undangan" style="text-decoration: none;">
                        <div class="info-box d-flex justify-content-center">
                            <div class="d-flex align-items-center text-dark">
                                <span class="info-box-text">see more</span>
                                <span class="info-box-icon "><i class="bi bi-arrow-right-circle-fill"></i></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </div>

    <div class="daftar-undangan" id="daftar-undangan">
        <div class="title d-flex justify-content-center " style=" height: 100vh;">
            <div class="container card">
                <div class="text-center">
                    <h1>Daftar-Tamu</h1>
                    @if ($ucapan->count() == 0)
                        <h5>tidak ada tamu yang mengisi</h5>
                    @endif
                </div>
                <div class="tamu row  container">
                    @foreach ($ucapan as $ucapan)
                        <div class="col-md-3 col-sm-6 col-12">
                            <div
                                class="info-box bg-gradient-info 
                                    @if ($ucapan->kehadiran == 2) {{ 'bg-gradient-danger' }} @endif">
                                <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

                                <div class="info-box-content">
                                    <h4 class="info-box-text">Dari {{ $ucapan->nama }} </h4>
                                    <span class="">
                                        <butto type="button" class="btn fs-2 text-light" data-bs-toggle="modal"
                                            data-bs-target="#envelove{{ $ucapan->id }}"><i
                                                class=" bi bi-envelope-heart"></i></butto>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>



                        <!-- Modal -->
                        <div class="modal fade" id="envelove{{ $ucapan->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Dari {{ $ucapan->nama }}
                                            <span class="">
                                                @if ($ucapan->kehadiran == 1)
                                                    <b class="text-success">hadir</b>
                                                @else
                                                    <b class="text-danger">Berhalangan Hadir</b>
                                                @endif
                                            </span>
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{ $ucapan->ucapan }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>














</body>

</html>
