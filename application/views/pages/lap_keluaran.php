<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $pageName ?></h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url() . 'index.php/dasbor'; ?>">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </div>

  <div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Tabel Pengeluaran</h6>
          <div class="filter">
            <form id="filter-tgl" action="<?= base_url() . 'index.php/printlaporan/laporankeluar' ?>" method="POST">
              <div class="form-row">
                <div class="col">
                  <input id="dp1" name="tglawal" class="form-control" placeholder="Tanggal Awal">
                </div>
                <div class="col">
                  <input id="dp2" name="tglakhir" class="form-control" placeholder="Tanggal Akhir">
                </div>
                <button class="btn btn-success ml-2" id="filter-btn">
                  <i class="fas fa-filter"></i>
                </button>
                <button class="btn btn-warning ml-2" id="reset-btn">
                  <i class="fas fa-redo"></i>
                </button>
                <button type="submit" class="btn btn-danger ml-2">
                  <i class="fas fa-file-pdf"></i>
                  Print
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                <th>No Laporan</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Jumlah Keluar</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<script>
  var url = '<?= base_url() . 'index.php/laporankeluar/' ?>';

  function convertToRupiah(angka) {
    var rupiah = '';
    var angkarev = angka.toString().split('').reverse().join('');
    for (var i = 0; i < angkarev.length; i++)
      if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
    return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
  }

  $(document).ready(function() {
    var table = $('#dataTable').DataTable({
      ajax: url + 'view',
      columns: [{
          data: 'id_laporan'
        },
        {
          data: 'tanggal'
        },
        {
          data: 'uraian'
        },
        {
          data: 'jumlah',
          render: function(data, type, row) {
            return convertToRupiah(data);
          }
        },
      ]
    });

    $('#dp1').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
    });
    $('#dp2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
    });

    $('#filter-btn').click(function(e) {
      if ($('#dp1').val() == '' || $('#dp2').val() == '') {
        alert('Tanggal awal dan akhir harus diisi');
      } else {
        table.ajax.url(url + 'filtertabel/' + $('#dp1').val() + '/' + $('#dp2').val()).load();
      }
      e.preventDefault();
    });

    $('#reset-btn').click(function(e) {
      table.ajax.url(url + 'view').load();
      e.preventDefault();
    });

  });
</script>