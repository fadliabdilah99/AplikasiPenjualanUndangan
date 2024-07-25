@extends('template.main')

@section('content')

    @include('profile.modal')

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

    @if (auth()->user()->role == 'admin')
        <div class="row p-3">
            <div class="col-lg-4 col-6">
                <!-- small card -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $terjual }}</h3>

                        <p>Undangan terjual</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small card -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>Rp. {{ $pendapatan }}</h3>

                        <p>Pendapatan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small card -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $belumdibayar }}</h3>

                        <p>belum di bayar</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline collapsed"
                                aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>jenis undangan</th>
                                        <th>Id undangan</th>
                                        <th>Pembeli</th>
                                        <th>tenggat</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produk2 as $list)
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $list->nama }}</td>
                                            <td>{{ $list->id }}</td>
                                            <td>{{ $list->name }}</td>
                                            <td>
                                                @if ($list->tanggal > $date)
                                                    {{ $list->tanggal }}
                                                @else
                                                    <form action="{{ url('delete/' . $list->id) }}" method="POST"
                                                        style="display: inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn bg-danger delete-data" type="button">
                                                            <i class="fas fa-trash-alt"></i> <i class="bi bi-trash3"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                            <td class="{{ $list->status == 'public' ? 'text-success' : 'text-danger' }}">
                                                {{ $list->status }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>

                                    <tr>
                                        <td colspan="2" style="text-align: center;"><strong>Total Pendapatan:</strong>
                                        </td>
                                        <td><strong>{{ $terjual }}</strong></td>
                                        <td colspan="2" style="text-align: center;"><strong>Total Pendapatan:</strong>
                                        </td>
                                        <td><strong>{{ $pendapatan }}</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.card-body -->
        </div>
    @else
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Undangan anda</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Pasangan</th>
                                    <th>Harga</th>
                                    <th>Tanggal kadaluarsa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produk2 as $dua)
                                    <tr>
                                        <td>{{ $dua->id }}</td>
                                        <td>{{ $dua->pengantin_l }} & {{ $dua->pengantin_p }}</td>
                                        <td>
                                            @if ($dua->discount == null)
                                                <?php $harga = $dua->harga; ?>
                                            @else
                                                <?php $harga = ($dua->harga * $dua->discount) / 100; ?>
                                            @endif
                                            @if ($jumlah < 1)
                                                <?php $harga_akhir = $harga * 0.5; ?>
                                                <del class="text-danger">{{ $dua->harga }}</del>
                                            @else
                                                @if ($dua->harga != $harga)
                                                    <del class="text-danger">{{ $dua->harga }}</del>
                                                @endif
                                                <?php $harga_akhir = $harga; ?>
                                            @endif
                                            {{ $harga_akhir }}
                                        </td>
                                        <td>{{ $dua->tanggal }}</td>
                                        <td class="d-flex" style="gap:10px;">
                                            @if ($dua->No == 1)
                                                <a href="{{ url('ekonomi/' . $dua->id) }}" class="btn btn-info"><i
                                                        class="bi bi-eye"></i></a>
                                            @elseif($dua->No == 2)
                                                <a href="{{ url('luxuri/' . $dua->id) }}" class="btn btn-info"><i
                                                        class="bi bi-eye"></i></a>
                                            @endif
                                            @if ($dua->status == 'edit')
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#bayar{{ $dua->id }}">
                                                    Transfer
                                                </button>
                                                {{-- payment --}}
                                                <form action="#" id="donation_form">
                                                    <div class="" hidden>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">No</label>
                                                                    <input type="text" name="No"
                                                                        class="form-control" id="No"
                                                                        value="{{ $dua->No }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">Id</label>
                                                                    <input type="Number" name="undangan_id"
                                                                        class="form-control" id="undangan_id"
                                                                        value="{{ $dua->id }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">Nama</label>
                                                                    <input type="text" name="donor_name"
                                                                        class="form-control" id="donor_name"
                                                                        value="{{ $dua->name }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">E-Mail</label>
                                                                    <input type="email" name="donor_email"
                                                                        class="form-control" id="donor_email"
                                                                        value="{{ $dua->email }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="">Jenis Donasi</label>
                                                                    <input type="text" name="donation_type"
                                                                        class="form-control" id="donation_type"
                                                                        value="pembayaran undangan {{ $dua->id }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">Jumlah</label>
                                                                    <input type="number" name="amount"
                                                                        class="form-control" id="amount"
                                                                        value="{{ $harga_akhir }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">Catatan (Opsional)</label>
                                                                    <textarea name="note" cols="30" rows="3" class="form-control" id="note"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <button class="btn btn-success" type="submit">Payment</button>
                                                </form>
                                            @else
                                                <form action="{{ url('whatsapp') }}" method="POST">
                                                    @csrf
                                                    <input hidden type="text" name="link"
                                                        value="/{{ $dua->nama }}/{{ $dua->id }}" id="">
                                                    <input hidden type="text"
                                                        value="{{ $dua->pengantin_l }} & {{ $dua->pengantin_p }}"
                                                        name="pengantin">

                                                    <button type="submit" class="btn btn-info"><i
                                                            class="bi bi-send"></i></button>
                                                </form>
                                                {{-- ganti --}}
                                                <p hidden id="copy">
                                                    https://getbootstrap.com/docs/5.3/components/modal/#how-it-works</p>
                                                <button type="submit" class="btn btn-info" onclick="copyText('copy')"><i
                                                        class="bi bi-copy"></i></button>

                                                <form action="{{ url('daftartamu2') }}" method="POST">
                                                    @csrf
                                                    <input type="number" name="No" value="{{ $dua->No }}"
                                                        hidden>
                                                    <input type="number" name="undangan_id" value="{{ $dua->id }}"
                                                        hidden>
                                                    <button type="submit" class="btn btn-info"><i
                                                            class="bi bi-book-half"></i></button>
                                                </form>
                                            @endif
                                            <form action="{{ url('delete/' . $dua->id) }}" method="POST"
                                                style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn bg-danger delete-data" type="button">
                                                    <i class="fas fa-trash-alt"></i> <i class="bi bi-trash3"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <p class="px-2">metode payment hanya bisa di gunakan untuk pembayaran paling atas (jika anda
                        mempunyai >2 undangan yang belum di bayar)</p>
                </div>
                <!-- /.card -->
            </div>
        </div>
    @endif



@endsection


@push('script')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script
        src="{{ !config('services.midtrans.isProduction') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}"
        data-client-key="{{ config('services.midtrans.clientKey') }}"></script>

    <script src="{{ asset('assets') }}/plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script>
        $("#donation_form").submit(function(event) {
            event.preventDefault();

            $.post("/api/donation", {
                    _method: 'POST',
                    _token: '{{ csrf_token() }}',
                    No: $('input#No').val(),
                    undangan_id: $('input#undangan_id').val(),
                    donor_name: $('input#donor_name').val(),
                    donor_email: $('input#donor_email').val(),
                    donation_type: $('input#donation_type').val(),
                    amount: $('input#amount').val(),
                    note: $('textarea#note').val(),
                },
                function(data, status) {
                    console.log(data);
                    snap.pay(data.snap_token, {
                        // Optional
                        onSuccess: function(result) {
                            location.reload();
                        },
                        // Optional
                        onPending: function(result) {
                            location.reload();
                        },
                        // Optional
                        onError: function(result) {
                            location.reload();
                        }
                    });
                    return false;
                });
        });


        $('.delete-data').click(function(e) {
            e.preventDefault()
            const data = $(this).closest('tr').find('td:eq(1)').text()
            Swal.fire({
                    title: 'Data akan hilang!',
                    text: `Apakah penghapusan data ${data} akan dilanjutkan?`,
                    icon: 'warning',
                    showDenyButton: true,
                    confirmButtonText: 'Ya',
                    denyButtonText: 'Tidak',
                    focusConfirm: false
                })
                .then((result) => {
                    if (result.isConfirmed) $(e.target).closest('form').submit()
                    else swal.close()
                })
        });
    </script>


    {{-- fungsi copy --}}
    <script>
        function copyText(elementId) {
            // Buat elemen input sementara untuk menampung teks
            var tempInput = document.createElement("input");
            // Dapatkan teks dari elemen dengan id yang diberikan
            var textToCopy = document.getElementById(elementId).innerText;
            // Masukkan teks ke dalam elemen input
            tempInput.value = textToCopy;
            // Tambahkan elemen input ke dalam body
            document.body.appendChild(tempInput);
            // Pilih teks dalam elemen input
            tempInput.select();
            // Salin teks yang dipilih ke clipboard
            document.execCommand("copy");
            // Hapus elemen input sementara dari body
            document.body.removeChild(tempInput);
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.success-data').click(function(e) {
            e.preventDefault();
            const data = $(this).closest('.featurette').find('h2').text();
            Swal.fire({
                title: 'Success!',
                text: `Tersalin.`,
                icon: 'success',
                confirmButtonText: 'OK',
                focusConfirm: false
            });
        });
    </script>
@endpush
