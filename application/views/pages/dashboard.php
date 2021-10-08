<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $pageName ?></h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url() . 'index.php/dasbor'; ?>">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </div>

  <div class="row mb-3">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Laba Bersih Bulan Ini</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pendapatan; ?></div>
              <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-danger"><b><?= $pendapatanKotor; ?></b></span>
                <span>- Omset Bulan Ini</span>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-coins fa-2x text-primary"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Total Cucian Masuk bulan Ini</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $bulanini; ?> pelanggan</div>
              <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-success mr-2"> <?= $bulanKemarin; ?> </span>
                <span>Pelanggan bulan Kemarin</span>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-tshirt fa-2x text-primary"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- New User Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Cucian Sedang Diproses</div>
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $diproses; ?></div>
              <div class="mt-4 mb-0 text-muted text-xs">
                <!-- <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                <span>Since last month</span> -->
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-tshirt fa-2x text-warning"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Cucian Selesai</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $selesai; ?></div>
              <div class="mt-4 mb-0 text-muted text-xs">
                <!-- <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                <span>Since yesterday</span> -->
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-check fa-2x text-success"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mb-2">
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Grafik Pendapatan Laundry</h6>
        </div>
        <div class="card-body">
          <div class="chart-bar">
            <canvas id="myBarChart"></canvas>
          </div>
          <hr>
          Pendapatan Laundry Setiap Bulannya
        </div>
      </div>
    </div>
  </div>

  <!--Row-->
  <div class="row mb-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h5>Pintasan</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100 text-white bg-gradient-primary">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col-2">
                      <i class="fas fa-arrow-right fa-2x text-white"></i>
                    </div>
                    <div class="col mr-2">
                      <div class="text-md font-weight-bold text-uppercase mb-1">
                        <a class="text-white" href="<?= base_url() . 'index.php/pelanggan' ?>">Data Pelanggan</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100 text-white bg-gradient-primary">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col-2">
                      <i class="fas fa-arrow-right fa-2x text-white"></i>
                    </div>
                    <div class="col mr-2">
                      <div class="text-md font-weight-bold text-uppercase mb-1">
                        <a class="text-white" href="<?= base_url() . 'index.php/karyawan' ?>">Data Karyawan</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100 text-white bg-gradient-primary">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col-2">
                      <i class="fas fa-arrow-right fa-2x text-white"></i>
                    </div>
                    <div class="col mr-2">
                      <div class="text-md font-weight-bold text-uppercase mb-1">
                        <a class="text-white" href="<?= base_url() . 'index.php/pesanan' ?>">Data Pesanan</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100 text-white bg-gradient-primary">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col-2">
                      <i class="fas fa-arrow-right fa-2x text-white"></i>
                    </div>
                    <div class="col mr-2">
                      <div class="text-md font-weight-bold text-uppercase mb-1">
                        <a class="text-white" href="<?= base_url() . 'index.php/pengeluaran' ?>">Data Pengeluaran</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card h-100 text-white bg-gradient-danger">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col-2">
                      <i class="fas fa-arrow-right fa-2x text-white"></i>
                    </div>
                    <div class="col mr-2">
                      <div class="text-md font-weight-bold text-uppercase mb-1">
                        <a class="text-white" href="<?= base_url() . 'index.php/lap_pesanan' ?>">Laporan Order</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card h-100 text-white bg-gradient-danger">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col-2">
                      <i class="fas fa-arrow-right fa-2x text-white"></i>
                    </div>
                    <div class="col mr-2">
                      <div class="text-md font-weight-bold text-uppercase mb-1">
                        <a class="text-white" href="<?= base_url() . 'index.php/lap_keluar' ?>">Laporan Pengeluaran</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Row-->


</div>
</div>

<script src="<?= base_url() ?>/vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url() ?>/js/chart-bar.js"></script>