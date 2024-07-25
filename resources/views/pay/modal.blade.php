@foreach ($pay as $two)
    <div class="modal fade" id="pay{{ $two->id }}">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <img src="{{ asset('storage/assets/' . $two->foto) }}" width="300" alt="">
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endforeach
