<!-- resources/views/training/index.blade.php -->

@extends('layout.v_template')
@section('content')
<div class="card">
<div class="text-end mt-3">
  <a href="/prediksi" class="btn btn-primary">Tambah Prediksi</a>
</div>
  <h5 class="card-header">Tabel Data Training</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Tanggal</th>
          <th>Permintaan</th>
          <th>Aktual</th>
          <th>APE</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <?php $no = 1;?>
        @foreach ($trainings as $data)
        <tr>
          <td>{{ $no }}</td>
          <td>{{ $data->tanggal }}</td>
          <td>{{ $data->permintaan }}</td>
          <td>{{ $data->aktual }}</td>
          <td>{{ $data->ape }}</td>
          <?php $no++;?>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                <!-- <a class="dropdown-item" href="#"> -->
                  <!-- <i class="bx bx-edit-alt me-2"></i> Edit</a> -->
                  <a class="dropdown-item" href="{{ route('training.delete', $data->id_training) }}">
                  <i class="bx bx-trash me-2"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
