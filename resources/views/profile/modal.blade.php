@foreach ($produk2 as $two)
    <div class="modal fade" id="edit{{ $two->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url("update/$two->id") }}" method="POST">
                    @csrf
                    @if (Auth::check())
                        <input hidden type="number" name="user_id" value="{{ auth()->user()->id }}">
                    @endif
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pengantin Laki laki</label>
                            <input type="text" name="pengantin_l" class="form-control" id="exampleInputEmail1"
                                placeholder="Nama Pengantin" value="{{ $two->pengantin_l }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pengantin Perempuan</label>
                            <input type="text" name="pengantin_p" class="form-control" id="exampleInputEmail1"
                                placeholder="Nama Pengantin" value="{{ $two->pengantin_p }}">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


















    <div class="modal fade" id="bayar{{ $two->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>Bayar Undangan</b> </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container text-center">
                    <h5>Pembayaran hanya bisa di lakukan melalui rekening di bawah ini</h5>
                    {{-- no rekening --}}
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-primary collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Dapat diperluas</font>
                                        </font>
                                    </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="display: none;">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">
                                            Badan kartu
                                        </font>
                                    </font>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-3">
                            <div class="card card-primary collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Dapat diperluas</font>
                                        </font>
                                    </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="display: none;">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">
                                            Badan kartu
                                        </font>
                                    </font>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-3">
                            <div class="card card-primary collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Dapat diperluas</font>
                                        </font>
                                    </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="display: none;">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">
                                            Badan kartu
                                        </font>
                                    </font>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-3">
                            <div class="card card-primary collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Dapat diperluas</font>
                                        </font>
                                    </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="display: none;">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">
                                            Badan kartu
                                        </font>
                                    </font>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                {{-- form bukti pembayaran --}}
                <div class="card card-primary">
                    <form method="POST" action="{{ url("pay/$two->id") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <input hidden type="number" name="No" value="{{ $two->No }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Kirim Bukti Pembayaran</font>
                                    </font>
                                </label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="foto" class="custom-file-input"
                                            id="exampleInputFile" required>
                                        <label class="custom-file-label" for="exampleInputFile">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Pilih File</font>
                                            </font>
                                        </label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Mengunggah</font>
                                            </font>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Masukan No Hp (opsional)</font>
                                        </font>
                                    </label>
                                    <input type="number" name="Nohp" class="form-control"
                                        id="exampleInputEmail1" placeholder="Masukan No Hp">

                                    <p>*Notifikasi akan dikirimkan melalui whatsApp</p>

                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Kirim</font>
                                </font>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endforeach
