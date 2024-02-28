@extends('layout.v_template')
@section('content')

  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Tambahkan Data Periode</h5>
        <small class="text-muted float-end">Tambah Data</small>
      </div>
      <div class="card-body">
        <form action="{{ route('produk.insert') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name" name="id_periode">ID Periode</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="basic-default-name" name="id_periode" placeholder="" />
            </div>
          </div>
          <div class="mb-3 row">
            <label for="html5-date-input" class="col-md-2 col-form-label" name="tanggal">Date</label>
            <div class="col-md-10">
              <input class="form-control" type="date" name="tanggal" value="2023-06-18" id="html5-date-input" />
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name" name="pengiriman">Jumlah Pengiriman</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="basic-default-name" name="pengiriman" placeholder="" />
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name" name="produksi">Jumlah Produksi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="basic-default-name" name="produksi" placeholder="" />
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name" name="permintaan">Jumlah Permintaan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="basic-default-name" name="permintaan" placeholder="" />
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Send</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection