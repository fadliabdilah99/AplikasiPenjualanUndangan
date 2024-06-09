@extends('template.main')

@section('content')
    <div class="container my-3">
        <table id="example1" class="datatables table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nama Undangan</th>
                    <th>foto</th>
                    <th>harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($product as $prod)
                    <tr>
                        <td>{{ $prod->id }}</td>
                        <td>{{ $prod->nama }}</td>
                        <td>{{ $prod->foto }}</td>
                        <td>{{ $prod->harga }}</td>
                        <td>
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#modal-default{{ $prod->id }}">
                                Discount
                            </button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th>id</th>
                    <th>Nama Undangan</th>
                    <th>foto</th>
                    <th>harga</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="container mt-5">
        <h4 class="btn btn-info">Undagan Discount</h4>
        <table id="example1" class="datatables table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nama Undangan</th>
                    <th>foto</th>
                    <th>harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($product as $prod)
                    <tr>
                        <td>{{ $prod->id }}</td>
                        <td>{{ $prod->nama }}</td>
                        <td>{{ $prod->foto }}</td>
                        <td>{{ $prod->harga }}</td>
                        <td>
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#modal-default{{ $prod->id }}">
                                Discount
                            </button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th>id</th>
                    <th>Nama Undangan</th>
                    <th>foto</th>
                    <th>harga</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>

    @include('productadmin.modal')
@endsection
$@push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
@endpush
