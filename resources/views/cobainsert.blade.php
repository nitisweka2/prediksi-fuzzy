@extends('layout.v_template')

@section('content')
    <h2>Insert Data Training</h2>
    <form method="POST" action="{{ route('training.store') }}">
        @csrf
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal">
        </div>
        <div class="form-group">
            <label for="permintaan">Permintaan</label>
            <input type="number" class="form-control" id="permintaan" name="permintaan">
        </div>
        <div class="form-group">
            <label for="aktual">Aktual</label>
            <input type="number" class="form-control" id="aktual" name="aktual">
        </div>
        <div class="form-group">
            <label for="ape">APE</label>
            <input type="number" class="form-control" id="ape" name="ape">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
