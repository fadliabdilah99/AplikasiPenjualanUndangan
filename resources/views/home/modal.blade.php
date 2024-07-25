<!-- Modal product2 -->
<div class="modal fade" id="buydua" tabindex="-1" aria-labelledby="buyLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="buyLabel">Masukan Data berikut</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="createdua" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (Auth::check())
                        <input hidden type="number" name="user_id" value="{{ auth()->user()->id }}">
                    @endif
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1">Pengantin Laki laki</label>
                                <input type="text" name="pengantin_l" class="form-control" id="exampleInputEmail1"
                                    placeholder="Nama Pengantin">
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1">Pengantin Perempuan</label>
                                <input type="text" name="pengantin_p" class="form-control" id="exampleInputEmail1"
                                    placeholder="Nama Pengantin">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal penyelenggaraan</label>

                            <div class="input-group">
                                <div class="input-group-prepend">

                                </div>
                                <input type="date" class="form-control" data-inputmask-alias="datetime"
                                    data-inputmask-inputformat="mm/dd/yyyy" name="tanggal" data-mask=""
                                    inputmode="numeric">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <input type="text" name="ortu_LL" class="form-control" placeholder="Bpk pengantin L">
                            </div>
                            <div class="col-3">
                                <input type="text" name="ortu_LP" class="form-control" placeholder="Ibu pengantin L">
                            </div>
                            <div class="col-3">
                                <input type="text" name="ortu_PL" class="form-control" placeholder="Bpk pengantin P">
                            </div>
                            <div class="col-3">
                                <input type="text" name="ortu_PP" class="form-control" placeholder="Ibu pengantin P">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Akad</label>
                                    <input type="time" name="akad" class="form-control" placeholder="00:00">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Resepsi</label>
                                    <input type="time" name="resepsi" class="form-control" placeholder="00:00">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1">Link Google maps</label>
                                <input type="text" name="linkGmaps" class="form-control" id="exampleInputEmail1"
                                    placeholder="https://www.google.com/maps/....">
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1">Alamat Lokasi</label>
                                <input type="text" name="alamat" class="form-control" id="exampleInputEmail1"
                                    placeholder="Jl/kp">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1">Rekening 1</label>
                                <input type="text" name="rekening1" class="form-control" id="exampleInputEmail1"
                                    placeholder="contoh '123-BRI'">
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1">Rekening 2</label>
                                <input type="text" name="rekening2" class="form-control" id="exampleInputEmail1"
                                    placeholder="contoh '123-BRI">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="exampleInputFile">foto berdua</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="foto2" class="custom-file-input"
                                            id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                            file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-4">
                                <label for="exampleInputFile">Mempelai laki laki</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="foto_l" class="custom-file-input"
                                            id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                            file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-4">
                                <label for="exampleInputFile">Mempelai Perempuan</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="foto_p" class="custom-file-input"
                                            id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                            file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label for="exampleInputFile">5 Foto prewedding</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                    name="photos[]" multiple>
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text">Upload</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>








<!-- Modal product1 -->
<div class="modal fade" id="buysatu" tabindex="-1" aria-labelledby="buyLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="buyLabel">Masukan Data berikut</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="createsatu" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (Auth::check())
                        <input hidden type="number" name="user_id" value="{{ auth()->user()->id }}">
                    @endif
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1">Pengantin Laki laki</label>
                                <input type="text" name="pengantin_l" class="form-control"
                                    id="exampleInputEmail1" placeholder="Nama Pengantin">
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1">Pengantin Perempuan</label>
                                <input type="text" name="pengantin_p" class="form-control"
                                    id="exampleInputEmail1" placeholder="Nama Pengantin">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal penyelenggaraan</label>

                            <div class="input-group">
                                <div class="input-group-prepend">

                                </div>
                                <input type="date" class="form-control" data-inputmask-alias="datetime"
                                    data-inputmask-inputformat="mm/dd/yyyy" name="tanggal" data-mask=""
                                    inputmode="numeric">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <input type="text" name="ortu_LL" class="form-control"
                                    placeholder="Bpk pengantin L">
                            </div>
                            <div class="col-3">
                                <input type="text" name="ortu_LP" class="form-control"
                                    placeholder="Ibu pengantin L">
                            </div>
                            <div class="col-3">
                                <input type="text" name="ortu_PL" class="form-control"
                                    placeholder="Bpk pengantin P">
                            </div>
                            <div class="col-3">
                                <input type="text" name="ortu_PP" class="form-control"
                                    placeholder="Ibu pengantin P">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Akad</label>
                                    <input type="time" name="akad" class="form-control" placeholder="00:00">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Resepsi</label>
                                    <input type="time" name="resepsi" class="form-control" placeholder="00:00">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1">Link Google maps</label>
                                <input type="text" name="linkGmaps" class="form-control" id="exampleInputEmail1"
                                    placeholder="https://www.google.com/maps/....">
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1">Alamat Lokasi</label>
                                <input type="text" name="alamat" class="form-control" id="exampleInputEmail1"
                                    placeholder="Jl/kp">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1">Rekening 1</label>
                                <input type="text" name="rekening1" class="form-control" id="exampleInputEmail1"
                                    placeholder="contoh '123-BRI'">
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1">Rekening 2</label>
                                <input type="text" name="rekening2" class="form-control" id="exampleInputEmail1"
                                    placeholder="123-BRI">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputFile">Mempelai laki laki(persegi/1:1)</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="foto_l" class="custom-file-input"
                                            id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                            file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputFile">Mempelai Perempuan(persegi/1:1)</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="foto_p" class="custom-file-input"
                                            id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                            file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label for="exampleInputFile">5 Foto prewedding(landscape/16:9)</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                    name="photos[]" multiple>
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text">Upload</button>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
