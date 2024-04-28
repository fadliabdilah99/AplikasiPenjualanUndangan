@extends('template.main')

@section('content')
    {{-- @include('pay.modal') --}}


    <div class="content">

        @if (session('success'))
            <div id="toastsContainerTopRight" class="toasts-top-right fixed">
                <div class="toast bg-info fade show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header"><strong class="mr-auto">Info</strong><small>Important</small></div>
                    <div class="toast-body"> {{ session('success') }}</div>
                </div>
            </div>
        @endif
        @if (session('noted'))
            <div id="toastsContainerTopRight" class="toasts-top-right fixed">
                <div class="toast bg-warning fade show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header"><strong class="mr-auto">Info</strong><small>Important</small></div>
                    <div class="toast-body"> {{ session('noted') }}</div>
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h5><i class="icon fas fa-ban"></i>Data Gagal Disimpan!</h5>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="col-md mt-2">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Baca Surat</font>
                        </font>
                    </h3>

                    <div class="card-tools">
                        <a href="#" class="btn btn-tool" title="Sebelumnya"><i class="fas fa-chevron-left"></i></a>
                        <a href="#" class="btn btn-tool" title="Berikutnya"><i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="mailbox-read-info">
                        <h5>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Subjek Pesan Ditempatkan Di Sini</font>
                            </font>
                        </h5>
                        <h6>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Dari: {{ $message->send }}
                                </font>
                            </font><span class="mailbox-read-time float-right">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">15 Februari 2015 23:03</font>
                                </font>
                            </span>
                        </h6>
                    </div>
                    <!-- /.mailbox-read-info -->
                    <div class="mailbox-controls with-border text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm" data-container="body" title="Menghapus">
                                <i class="far fa-trash-alt"></i>
                            </button>
                            <button type="button" class="btn btn-default btn-sm" data-container="body" title="Membalas">
                                <i class="fas fa-reply"></i>
                            </button>
                            <button type="button" class="btn btn-default btn-sm" data-container="body" title="Maju">
                                <i class="fas fa-share"></i>
                            </button>
                        </div>
                        <!-- /.btn-group -->
                        <button type="button" class="btn btn-default btn-sm" title="Mencetak">
                            <i class="fas fa-print"></i>
                        </button>
                    </div>
                    <!-- /.mailbox-controls -->
                    <p>{{ $message->message }}</p>
                    <!-- /.mailbox-read-message -->
                </div>
                <!-- /.card-body -->

                <!-- /.card-footer -->
                <div class="card-footer">
                    <div class="float-right">
                        <button type="button" class="btn btn-default"><i class="fas fa-reply"></i>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Membalas</font>
                            </font>
                        </button>
                        <button type="button" class="btn btn-default"><i class="fas fa-share"></i>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Maju</font>
                            </font>
                        </button>
                    </div>
                    <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Menghapus</font>
                        </font>
                    </button>
                    <button type="button" class="btn btn-default"><i class="fas fa-print"></i>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Mencetak</font>
                        </font>
                    </button>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>

    @endsection
