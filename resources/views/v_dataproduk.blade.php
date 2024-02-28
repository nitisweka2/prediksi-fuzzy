@extends('layout.v_template')
@section('content')
<div class="card">
<div class="text-end mt-3">
  <a href="{{ route('produk.add') }}" class="btn btn-primary">Tambah Data</a>
</div>
  <h5 class="card-header">Tabel Data</h5>
  <div class="table-responsive text-nowrap">
  <div class="mb-3">
      <label for="dataLimit" class="form-label">Tampilkan:</label>
      <select id="dataLimit" class="form-select">
        <option value="10">10</option>
        <option value="25">25</option>
        <option value="100">100</option>
      </select>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>ID Periode</th>
          <th>Tanggal</th>
          <th>Pengiriman</th>
          <th>Produksi</th>
          <th>Permintaan</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($produk as $data)
        <tr>
        <td>{{$data->id_periode}}</td>
        <td>{{$data->tanggal}}</td>
        <td>{{$data->pengiriman}}</td>
        <td>{{$data->produksi}}</td>
        <td>{{$data->permintaan}}</td>
        <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('produk.edit', $data->id_periode) }}"
                  ><i class="bx bx-edit-alt me-2"></i> Edit</a>
                  <a class="dropdown-item" href="{{ route('produk.delete', $data->id_periode) }}">
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

<script>
  const dataLimitSelect = document.getElementById('dataLimit');
  dataLimitSelect.addEventListener('change', function() {
    const limit = this.value;
    window.location.href = '{{ route('produk') }}?limit=' + limit;
  });
</script>
@endsection
