@foreach ($produk2 as $two)
    <div class="modal fade" id="bayar{{ $two->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>Bayar Undangan</b> </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="text-center pt-3">
                    {{-- no rekening --}}
                    <div class="row d-flex justify-content-center">
                        <div class="col-5 card w-75 mb-3">
                            <div class="card-body d-flex justify-content-center">
                                <div class="content">
                                    <h5 class="card-title">BCA Digital</h5>
                                    <p class="card-text" id="bca-text">009659863213</p>
                                    <button class="btn btn-outline-secondary fs-5 success-data" id="btn-salin" onclick="copyText('bca-text')">salin</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-5 card w-75 mb-3">
                            <div class="card-body d-flex justify-content-center">
                                <div class="content">
                                    <h5 class="card-title">Bank Jago</h5>
                                    <p class="card-text" id="jago-text">106464202103</p>
                                    <button class="btn btn-outline-secondary fs-5 success-data" id="btn-salin" onclick="copyText('jago-text')">salin</button>
                                </div>
                            </div>
                        </div>
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
                                    <input type="number" name="Nohp" class="form-control" id="exampleInputEmail1"
                                        placeholder="Masukan No Hp">

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
