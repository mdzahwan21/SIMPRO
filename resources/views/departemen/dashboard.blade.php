@extends('departemen.navbar')

@section('content')
    <div class="w-full p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <p class="text-sm font-large text-gray-900 truncate dark:text-gray-300" role="none">
            Welcome, {{ auth()->user()->name }}!
        </p>
    </div>

{{-- @section('content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Progress Studi IRS</p>
                    <h5 class="font-weight-bolder mb-0">
                      530
                      <span class="text-success text-sm font-weight-bolder">+250</span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Progress Studi KHS</p>
                    <h5 class="font-weight-bolder mb-0">
                      480
                      <span class="text-success text-sm font-weight-bolder">+120</span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Progress Studi PKL</p>
                    <h5 class="font-weight-bolder mb-0">
                      250
                      <span class="text-success text-sm font-weight-bolder">+30</span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Progress Studi Skripsi</p>
                    <h5 class="font-weight-bolder mb-0">
                      230
                      <span class="text-success text-sm font-weight-bolder">+100</span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <h5 style="font-size: 32px" class="mb-1 pt-2 text-bold">Profile</h5>
                    <div class="d-flex">
                      <div class="circle-icon">
                        <img src="/assets/img/depart.png" alt="depart" class="rounded-circle" style="width: 70px; height: 70px">
                      </div>
                      <div class="mb-3">
                        <div style="position: relative; left: 20px">
                          <div>
                            <p style="font-size: 20px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" class="font-weight-bolder">Sambiroto Puji Lestari</p>
                            <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Departemen<br />
                              35214100125412 <br />
                              800 Mahasiswa <br />
                              Akreditasi: A <br />
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                      Read More
                      <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card h-100 p-3">
            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('../assets/img/ivancik.jpg');">
              <span class="mask bg-gradient-dark"></span>
              <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                <h5 class="text-white font-weight-bolder mb-4 pt-2">Sambiroto Puji Lestari</h5>
                <p class="text-white">Departemen yang bertugas dalam mengawasi progress studi mahasiswa/i agar teratur dan dapat lulus tepat waktu.</p>
                <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                  Read More
                  <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-15 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="bg-gradient-dark border-radius-lg py-15 pe-1 mb-3">
                <div class="chart">
                  <canvas id="chart-bars" class="chart-canvas" height="550px"></canvas>
                </div>
              </div>
              <h6 class="ms-2 mt-4 mb-0"> Aktivitas Departemen </h6>
              <p class="text-sm ms-2"> (<span class="font-weight-bolder">+50%</span>) than last month </p>
              <div class="container border-radius-lg">
                <div class="row">
                  <div class="col-3 py-3 ps-0">
                    <div class="d-flex mb-2">
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="/assets/js/plugins/chartjs.min.js"></script>
  <script src="/assets/js/plugins/Chart.extension.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"],
        datasets: [{
          label: "Mei",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          backgroundColor: "#fff",
          data: [10, 10, 22, 18, 40, 98, 38, 43, 35, 60, 68, 70, 65, 73, 78, 80, 10, 88, 88, 100, 100, 90, 85, 60, 63, 48, 40, 70, 84, 70, 85],
          maxBarThickness: 10
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          display: false,
        },
        tooltips: {
          enabled: true,
          mode: "index",
          intersect: false,
        },
        scales: {
          yAxes: [{
            gridLines: {
              display: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 100,
              beginAtZero: true,
              padding: 0,
              fontSize: 14,
              lineHeight: 3,
              fontColor: "#fff",
              fontStyle: 'normal',
              fontFamily: "Open Sans",
            },
          }, ],
          xAxes: [{
            gridLines: {
              display: false,
            },
            ticks: {
              display: false,
              padding: 20,
            },
          }, ],
        },
      },
    });
  </script> --}}
@endsection
    
{{-- @endsection --}}
