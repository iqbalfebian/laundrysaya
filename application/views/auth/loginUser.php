<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?= base_url() ?>img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Login</title>
  <link href="<?= base_url() ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Ruang Admin</h1>
                  </div>
                  <?php if ($this->session->flashdata()) : ?>
                    <div class="alert alert-danger" role="alert">
                      <?= $this->session->flashdata('pesan'); ?>
                    </div>
                  <?php endif; ?>
                  <form class="user" action="<?= base_url() . 'index.php/proses_login' ?>" method="POST">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control" id="uname" aria-describedby="emailHelp" placeholder="Masukkan Username">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control" id="pw" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <button type="submit" id="login" class="btn btn-primary btn-block">Login</button>
                    </div>
                  </form>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Login Content -->
  <script src="<?= base_url() ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?= base_url() ?>js/ruang-admin.min.js"></script>
  <script src="<?= base_url(); ?>/js/sweetalert2.all.min.js"></script>

  <script>
    $('div.alert').delay(3000).fadeOut();
  </script>
</body>

</html>