@extends('template.main')

@section('content')

    @include('pay.modal')

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




    <div class="container py-4">

        <table id="example1" class="datatables table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>Id Undangan</th>
                    <th>Pengantin</th>
                    <th>Bukti Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($pay as $pay)
                    <tr>
                        <td>{{ $pay->undagan_id }}</td>
                        <td>{{ $pay->pengantin_l }} & {{ $pay->pengantin_p }}</td>
                        <td> <button class="btn btn-warning" type="button" data-toggle="modal"
                                data-target="#pay{{ $pay->id }}">Bukti Transfer</button></td>
                        <td>
                            <div class="row  justify-content-center" style="gap:10px;">
                                <form action="confirpay/{{ $pay->id }}" method="POST">
                                    @csrf
                                    <input hidden type="number" value="{{ $pay->No }}" name="No">
                                    <input hidden type="number" value="{{ $pay->undagan_id }}" name="undangan_id">
                                    <input hidden type="email" name="send" value="{{ Auth::user()->email }}">
                                    <input hidden type="email" name="to" value="{{ $pay->email }}">
                                    <input hidden type="text" name="title" value="Notifikasi Pembayaran">
                                    <input hidden type="text" name="massage"
                                        value="Hallo Pelanggan Setia Kami, Kami Menginformasikan undangan dari pengantin {{ $pay->pengantin_l }} & {{ $pay->pengantin_p }} telah terkonfirmasi dan BERHASIL anda sekarang bisa mengakses undangan hingga batas wakti resepsi">
                                    <button type="submit" class="btn btn-success">Konfirmasi</button>
                                </form>
                                <form action="tolakpay/{{ $pay->id }}" method="POST">
                                    @csrf
                                    <input hidden type="email" name="send" value="{{ Auth::user()->email }}">
                                    <input hidden type="email" name="to" value="{{ $pay->email }}">
                                    <input hidden type="text" name="title" value="Notifikasi Pembayaran">
                                    <input hidden type="text" name="massage"
                                        value="Hallo Pelanggan Setia Kami, Kami Menginformasikan undangan dari pengantin {{ $pay->pengantin_l }} & {{ $pay->pengantin_p }} telah terkonfirmasi dan Gagal Melakan Pembayaran karna alsan tertentu, mohon hubungi admin@admin.com untuk aduan penolakan">
                                    <button type="submit" class="btn btn-danger">tolak</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th>Id Undangan</th>
                    <th>Pengantin</th>
                    <th>Bukti Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>

@endsection
