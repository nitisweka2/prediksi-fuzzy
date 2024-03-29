@extends('layout.v_template')

@section('content')
  
   
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">
                <h5 class="card-title text-primary">Selamat Datang di Fresh Forever! 🎉</h5>
                <p class="mb-4">
                  Aplikasi Optimasi Jumlah Produksi Tempe Menggunakan Metode Fuzzy Sugeno
                </p>

                <!-- <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> -->
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img
                  src="{{asset('template/')}}/assets/img/illustrations/man-with-laptop-light.png"
                  height="140"
                  alt="View Badge User"
                  data-app-dark-img="illustrations/man-with-laptop-dark.png"
                  data-app-light-img="illustrations/man-with-laptop-light.png"
                />
              </div>
            </div>
          </div>
  @endsection