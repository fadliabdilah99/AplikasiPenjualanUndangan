@foreach ($product as $item)
    <div class="modal fade" id="modal-default{{ $item->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Discount Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="discount" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Undangan</label>
                                <div class="col-sm-10">
                                    <select class="form-control  select2 select2-hidden-accessible" name="undangan_id"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option value="{{ $item->id }}">{{$item->nama}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Discount</label>
                                <div class="col-sm-10">
                                    <input type="Number" name="discount" class="form-control" id="inputPassword3"
                                        placeholder="0%">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deskripsi" class="col-sm-2 col-form-label">deskripsi</label>
                                <div class="col-sm-10">
                                    <input type="text" name="deskripsi" class="form-control" id="deskripsi"
                                        placeholder="deskripsi">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="">
                            <button type="submit" class="btn btn-info">
                                Luncurkan
                            </button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
                <div class="modal-footer justify-content-between">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endforeach
