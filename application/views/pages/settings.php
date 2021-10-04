<?= $this->session->flashdata('pesan'); ?>
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $pageName ?></h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url() . 'index.php/dasbor'; ?>">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </div>

  <div class="row">
    <div class="col-lg-8">
      <form enctype="multipart/form-data" action="<?= base_url() . 'index.php/settings/simpan' ?>" method="POST">
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Pengaturan</h6>
            <button class="btn btn-primary" id="simpan">
              Simpan
            </button>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="exampleFormControlInput1">Nama Toko</label>
              <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama Toko" value="<?= $setting->nama_app; ?>">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Email Toko</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan Email Toko" value="<?= $setting->email; ?>">
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Alamat Toko</label>
              <textarea class="form-control" name="alamat" id="alamat" rows="3"><?= $setting->alamat; ?></textarea>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="col-lg-4">
      <form enctype="multipart/form-data" action="<?= base_url() . 'index.php/settings/logoApp' ?>" method="POST">
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Logo APP</h6>
            <button class="btn btn-primary" id="simpan">
              Simpan
            </button>
          </div>
          <div class="card-body">
            <img style="width: 100px;" src="<?= file_exists('asset/logo/' . $setting->logo) ? base_url() . 'asset/logo/' . $setting->logo : base_url() . 'asset/logo/logo.png'; ?>" alt="logo app">
            <hr>
            <div class="form-group">
              <label for="exampleFormControlFile1">Ganti Logo APP :</label>
              <input type="file" name="logo" class="form-control-file" id="logo">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>