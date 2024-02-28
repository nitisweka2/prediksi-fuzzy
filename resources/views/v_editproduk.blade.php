@extends('layout.v_template')

@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Update Data Periode</h5>
                <small class="text-muted float-end">Ubah Data</small>
            </div>
            <div class="card-body">
              <form action="/produk/update/{{$produk->id_periode}}" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="html5-date-input" class="col-md-2 col-form-label">Tanggal</label>
                        <div class="col-md-10">
                            <input class="form-control" type="date" name="tanggal" value="{{ $produk->tanggal }}" id="html5-date-input" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Jumlah Pengiriman</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="pengiriman" value="{{ $produk->pengiriman }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Jumlah Produksi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="produksi" value="{{ $produk->produksi }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Jumlah Permintaan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="permintaan" value="{{ $produk->permintaan }}" />
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
