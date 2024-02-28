@extends('layout.v_template')
@section('content')
Prediksi <br>
<div class="col-lg-4 col-md-6">
    <div class="mt-4">
        <form id="formPrediksi" method="POST" action="{{ route('prediksi.proses') }}">
            @csrf
            <div class="form-group row">
                <div class="col-sm-8">
                    <select class="form-select" id="tanggal" name="tanggal">
                        @foreach ($data as $item)
                            <option value="{{ $item->tanggal }}">{{ $item->tanggal }}</option>
                        @endforeach
                            @if (count($data) > 0)
                              <?php
                                  $sortedData = $data->sortBy('tanggal'); // Mengurutkan data berdasarkan tanggal
                                  $lastItem = $sortedData->last(); // Mendapatkan item terakhir dari data
                                  $nextDate = \Carbon\Carbon::parse($lastItem->tanggal)->addDay(); // Menambahkan 1 hari ke tanggal terakhir
                              ?>
                              <option value="{{ $nextDate->format('Y-m-d') }}">Prediksi Periode Selanjutnya</option>
                            @endif
                    </select>
                </div>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary" onclick="checkFebruary(event)">Pilih</button>
                </div>
            </div>
        </form>
<!-- Rest of your code -->
<script>
    function checkFebruary(event) {
        // Get the selected date value from the dropdown
        var selectedDate = document.getElementById('tanggal').value;

        // Parse the date to a Date object
        var parsedDate = new Date(selectedDate);

        // Check if the selected date is before February
        if (parsedDate.getMonth() < 1) { // February is month 1 (January is 0)
            alert("Pilih tanggal pada bulan Februari karena kecukupan data adalah 8 data");

            // Prevent the form from submitting
            event.preventDefault();
            function cancel() {
        alert("Pilihan dibatalkan");
    }
        }
    }
</script>
<br>
                        <button
                          type="button"
                          class="btn btn-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#fullscreenModal"
                        >
                          Hitung
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="fullscreenModal" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-fullscreen" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalFullTitle">Prediksi Tsukamoto</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                <p>
                                  Aturan:<br>
                                  1. Jika pengiriman rendah dan produksi sedikit, maka permintaan kecil<br>
                                  2. Jika pengiriman rendah dan produksi banyak, maka permintaan kecil<br>
                                  3. Jika pengiriman tinggi dan produksi sedikit, maka permintaan kecil<br>
                                  4. Jika pengiriman tinggi dan produksi banyak, maka permintaan besar.<br>
                                </p>
                                <p>
                                  <h5><center><b>FUZZYFIKASI<b></center></h5>
                                </p>
                                <p>
                                    <!-- tabel fuzzyfikasi -->
                                 
                               <!-- Bootstrap Dark Table -->
                                <div class="card">
                                <h5 class="card-header">Fuzzyfikasi</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-dark">
                                    <thead>
                                        <tr>
                                        <th>Variabel</th>
                                        <th>Turun (a)</th>
                                        <th>Naik (b)</th>
                                        <th>Turun (x)</th>
                                        <th>Naik (x)</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <tr>
                                        <td>pengiriman</td>
                                        <td>{{ $nilai_a_pengiriman}}</td>
                                        <td>{{ $nilai_b_pengiriman}}</td>
                                        <td>{{ $dataTerakhirMinPengiriman}}</td>
                                        <td>{{ $dataTerakhirMaxPengiriman}}</td>
                                        </tr>
                                        <tr>
                                        <td>produksi</td>
                                        <td>{{ $nilai_a_produksi}}</td>
                                        <td>{{ $nilai_b_produksi}}</td>
                                        <td>{{ $dataTerakhirMinProduksi}}</td>
                                        <td>{{ $dataTerakhirMaxProduksi}}</td>
                                        </tr>
                                        <tr>
                                        <td>permintaan</td>
                                        <td>{{ $nilai_a_permintaan}}</td>
                                        <td>{{ $nilai_b_permintaan}}</td>
                                        <td>{{ $dataTerakhirMinPermintaan}}</td>
                                        <td>{{ $dataTerakhirMaxPermintaan}}</td>
                                        </tr>
                                        <!-- Tambahkan baris di sini untuk setiap entri dalam tabel -->
                                    </tbody>
                                    </table>
                                </div>
                                </div>
                                <!--/ Bootstrap Dark Table -->
                                </p>
                                <p><h5><center><b>INFERENSI<b></center></h5>
                                 <!-- Bootstrap Dark Table -->
                                 <div class="card">
                                <h5 class="card-header">Himpunan</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-dark">
                                    <thead>
                                        <tr>
                                        <th>Variabel</th>
                                        <th>Turun </th>
                                        <th>Naik </th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <tr>
                                        <td>pengiriman</td>
                                        <td>{{$miu_xpengiriman_turun}}</td>
                                        <td>{{$miu_xpengiriman_naik}}</td>
                                        </tr>
                                        <tr>
                                        <td>produksi</td>
                                        <td>{{$miu_xproduksi_turun}}</td>
                                        <td>{{$miu_xproduksi_naik}}</td>
                                        </tr>
                                        <tr>
                                        <td>permintaan </td>
                                        <td>{{$miu_xpermintaan_turun}}</td>
                                        <td>{{$miu_xpermintaan_naik}}</td>
                                        </tr>
                                        <!-- Tambahkan baris di sini untuk setiap entri dalam tabel -->
                                    </tbody>
                                    </table>
                                </div>
                                </div>
                                <!--/ Bootstrap Dark Table -->
                                </p>  
                                <!-- Bordered Table -->
                                <div class="card">
                                    <h5 class="card-header">Nilai Keanggotaan</h5>
                                    <div class="card-body">
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th colspan="2" class="text-center">Pengiriman</th>
                                        <th colspan="2" class="text-center">Produksi</th>
                                        <th class="text-center">Alpha min</th>
                                        <th class="text-center">Permintaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td class="text-center">rendah</td>
                                        <td class="text-center">{{$miu_xpengiriman_turun}}</td>
                                        <td class="text-center">sedikit</td>
                                        <td class="text-center">{{$miu_xproduksi_turun}}</td>
                                        <td class="text-center">{{$alpha_1}}</td>
                                        <td class="text-center">{{$ambil_alp_pred1}}</td>
                                        </tr>
                                        <tr>
                                        <td class="text-center">rendah</td>
                                        <td class="text-center">{{$miu_xpengiriman_turun}}</td>
                                        <td class="text-center">tinggi</td>
                                        <td class="text-center">{{$miu_xproduksi_naik}}</td>
                                        <td class="text-center">{{$alpha_2}}</td>
                                        <td class="text-center">{{$ambil_alp_pred2}} </td>
                                        </tr>
                                        <tr>
                                        <td class="text-center">tinggi</td>
                                        <td class="text-center">{{$miu_xpengiriman_naik}}</td>
                                        <td class="text-center">sedikit</td>
                                        <td class="text-center">{{$miu_xproduksi_turun}}</td>
                                        <td class="text-center">{{$alpha_3}}</td>
                                        <td class="text-center">{{$ambil_alp_pred3}}</td>
                                        </tr>
                                        <tr>
                                        <td class="text-center">tinggi</td>
                                        <td class="text-center">{{$miu_xpengiriman_naik}}</td>
                                        <td class="text-center">tinggi</td>
                                        <td class="text-center">{{$miu_xproduksi_naik}}</td>
                                        <td class="text-center">{{$alpha_4}}</td>
                                        <td class="text-center">{{$ambil_alp_pred4}}</td>
                                        </tr>
                                        <tr>
                                        <td class="text-center" colspan="4">Alpha Total</td>
                                        <td class="text-center"> {{$alpha_tot}}</td>
                                        <td></td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>
                                </div>
                                </div>
                                <!--/ Bootstrap Dark Table -->


                                <p><h5><center><b>DEFUZZYFIKASI<b></center></h5></p>
                                <p>
                                  Rata - Rata:<br>
                                  Z = (α1 * Z1 + α2 * Z2 + α3 * Z3 + α4 * Z4) / (α1 + α2 + α3 + α4)<br>
                                  Z = {{$z_tal}}<br>
                                  Sehingga permintaan untuk periode selanjutnya yaitu {{floor($z_tal)}}<br>
                                  <br>Atau jumlah optimal yang di produksi periode selanjutnya yaitu sekitar {{floor($z_tal)}}
                                </p>

                                <!--MODAL UNTUK SAVE DATA-->
                                <form method="POST" action="{{ route('masukkan') }}">
                                @csrf
                                <div class="modal-footer">
  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
  <input type="hidden" name="tanggal" value="{{ $simpan_tanggal }}">
  <input type="hidden" name="permintaan" value="{{ floor($z_tal) }}">
  <?php if($potensial == "hidden"){
    $type = "input";
    $save = "Data Sudah Ada";
    $disabled= " disabled ";
  }
  else{
    $type = "button";
    $save= "Save changes";
    $disabled = " ";
  } ?>
  <button type="submit" class="btn btn-primary"{{$disabled}}onclick="simpanData()">{{$save}}</button>
</div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<script>
function simpanData() {
  // Konfirmasi penyimpanan data
  var isConfirmed = confirm("Apakah Anda yakin ingin menyimpan data?");

  // Jika tombol "Save changes" dipilih (yakin)
  if (isConfirmed) {
    // Ambil nilai dari elemen dengan id "bro"
    var broValue = document.getElementById('bro').value;
    console.log("brabro");
  } else {
    // Jika tombol "Save changes" tidak dipilih (batal)
    alert("Data tidak disimpan.");
  }
}
</script>
<!-- HINGGA INI -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="m-0" />
                <div class="card-body">
                  <div class="row gy-3">
                    <!-- Modal Sizes -->
                    <div class="col-lg-4 col-md-6">
                      <small class="text-light fw-semibold">  </small>
                      <!-- Small Modal -->
                      <div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel2">Modal title</h5>
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                              ></button>
                            </div></div></div></div></div>
                    
@endsection