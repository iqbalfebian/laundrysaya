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
    <div class="col-lg-8">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Tabel Pesanan</h6>
          <button class="btn btn-primary" id="tambah-data">
            Entri Baru
          </button>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                <th>No Pesanan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="font-weight-bold text-primary">Petunjuk</h5>
        </div>
        <div class="card-body">
          <ol>
            <li>
              Tekan tombol dengan ikon <i class="fas fa-eye"></i> untuk melihat detail pengguna.
            </li>
            <li>
              Tekan tombol dengan ikon <i class="fas fa-edit"></i> untuk mengedit pengguna.
            </li>
            <li>
              Tekan tombol dengan ikon <i class="fas fa-trash"></i> untuk menghapus pengguna.
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- modal detail -->
<div class="modal fade" id="view-pesanan" tabindex="-1" role="dialog" aria-labelledby="view-pesanan-title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="view-pesanan-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="view-pesanan-body" class="modal-body p-4">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<!-- Modal tambah pesanan -->
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-tambah-title">Tambah Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-tambah-pesanan">
        <div class="modal-body">
          <div class="row mb-4">
            <div class="col-md-6" id="tanggal-input"></div>
            <div class="col-md-6" id="id-order"></div>
          </div>
          <div class="form-group">
            <label for="nama">Nama customer</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
          </div>
          <div class="form-group">
            <label for="inputState">Paket yang dipilih</label>
            <select name="paket" id="paket" class="form-control">
              <option selected>--pilih--</option>
              <?php foreach ($listPaket as $l) : ?>
                <option value="<?= $l->id; ?>"><?= $l->id . ' ' . $l->name . ' ' . $l->price; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="berat">Masukkan Berat cucian (Kg)</label>
            <input name="berat" type="number" class="form-control" id="berat" placeholder="0 Kg">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" id="simpan-data" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal edit pesanan -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-edit-title">Edit Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-edit-pesanan">
        <div class="modal-body">
          <input type="hidden" name="edit-id" id="edit-id">
          <div class="form-group">
            <label for="nama">Nama customer</label>
            <input type="text" class="form-control" name="edit-nama" id="edit-nama" placeholder="Masukkan Nama">
          </div>
          <div class="form-group">
            <label for="inputState">Paket yang dipilih</label>
            <select name="edit-paket" id="edit-paket" class="form-control">
              <option selected>--pilih--</option>
              <?php foreach ($listPaket as $l) : ?>
                <option value="<?= $l->id; ?>"><?= $l->id . ' ' . $l->name . ' ' . $l->price; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="berat">Masukkan Berat cucian (Kg)</label>
            <input name="edit-berat" type="number" class="form-control" id="edit-berat" placeholder="0 Kg">
          </div>
          <p>Status Pesanan :</p>
          <?php foreach ($listStatus as $ls) : ?>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="edit-status" id="edit-status" value="<?= $ls->id; ?>">
              <label class="form-check-label" for="flexRadioDefault1">
                <?= $ls->nama; ?>
              </label>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" id="simpan-edit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  var url = '<?= base_url() . 'index.php/datapesanan/' ?>';
  var date = null;
  var num = null;

  //fungsi untuk membuat angka acak
  function randomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
  }

  //fungsi untuk menampilkan tanggal sekarang
  function dateNow() {
    var d = new Date();
    var day = String(d.getDate()).padStart(2, '0');
    var month = String(d.getMonth() + 1).padStart(2, '0');
    var year = d.getFullYear();
    return year + '-' + month + '-' + day;
  }

  function hargaTotal(berat, paket) {
    var data = <?= json_encode($listPaket); ?>;
    var total = 0;
    for (var i = 0; i < data.length; i++) {
      if (data[i]['id'] == paket) {
        total = berat * data[i]['price'];
      }
    }
    return total;
  }

  function convertToRupiah(angka) {
    var rupiah = '';
    var angkarev = angka.toString().split('').reverse().join('');
    for (var i = 0; i < angkarev.length; i++)
      if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
    return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
  }

  function statusPesanan(id) {
    var status = <?= json_encode($listStatus); ?>;
    var result = '';
    for (var i = 0; i < status.length; i++) {
      if (status[i]['id'] == id) {
        result = status[i]['nama'];
      }
    }
    return result;
  }

  function paket(id) {
    var paket = <?= json_encode($listPaket); ?>;
    var result = '';
    for (var i = 0; i < paket.length; i++) {
      if (paket[i]['id'] == id) {
        result = paket[i];
      }
    }
    return result;
  }

  $(document).ready(function() {


    //fungsi untuk menampilkan data di dalam tabel
    var table = $('#dataTable').DataTable({
      ajax: url + 'view',
      columns: [{
        data: 'id_order'
      }, {
        data: 'tanggal'
      }, {
        data: 'status',
        render: function(data, type, row) {
          return statusPesanan(data);
        }
      }],
      columnDefs: [{
        targets: 3,
        defaultContent: `<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <button id="detail" type="button" class="btn btn-primary"><i class="fas fa-eye"></i></button>
                            <button id="edit" type="button" class="btn btn-success"><i class="fas fa-pencil-alt"></i></button>
                            <button id="delete" type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                          </div>`
      }, {
        targets: 1,
        defaultContent: `<p class="text-muted">Kosong</p>`
      }]
    });

    //fungsi untuk menghapus entri
    $('#dataTable tbody').on('click', 'button#delete', function() {
      var data = table.row($(this).parents('tr')).data();
      Swal.fire({
        title: 'Yakin ingin menghapus ?',
        showCancelButton: true,
        cancelButtonText: 'Batal',
        confirmButtonText: 'Hapus',
        confirmButtonColor: '#d33',
      }).then((result) => {
        if (result.isConfirmed) {
          $.post({
            url: url + 'hapus',
            data: {
              id: data.id_order
            },
            success: function(data) {
              table.ajax.reload();
              Swal.fire('Data dihapus!', '', 'success');
            }
          });
        }
      });
    });

    //fungsi untuk melihat detail entri
    $('#dataTable tbody').on('click', 'button#detail', function() {
      var data = table.row($(this).parents('tr')).data();
      $('#view-pesanan').modal('show');
      $('#view-pesanan-title').text('Detail Pesanan : ' + data.id_order);
      $('#view-pesanan-body').html(`
      <table style="width:100%">
        <tr>
          <td>No Pesanan</td>
          <td>${data.id_order}</td>
        </tr>
        <tr>
          <td>Tanggal</td>
          <td>${data.tanggal}</td>
        </tr>
        <tr>
          <td>Nama Customer</td>
          <td>${data.nama}</td>
        </tr>
        <tr>
          <td>No Paket</td>
          <td>${paket(data.id_paket).id + ' ' + paket(data.id_paket).name + ' ' + convertToRupiah(paket(data.id_paket).price)}</td>
        </tr>
        <tr>
          <td>Berat Cucian</td>
          <td>${data.berat} Kg</td>
        </tr>
        <tr>
          <td>Total Harga</td>
          <td>${convertToRupiah(data.total)}</td>
        </tr>
        <tr>
          <td>Status</td>
          <td>${statusPesanan(data.status)}</td>
        </tr>
      </table>
      `);
      $('#view-pesanan-body table tr td:nth-child(1)').css({
        'background-color': '#D0ECE7',
        'padding': '4px',
        'border': '2px solid white'
      });
      $('#view-pesanan-body table tr td:nth-child(2)').css({
        'background-color': '#D6EAF8',
        'padding': '4px',
        'border': '2px solid white'
      });
    });

    //fungsi untuk mengedit
    $('#dataTable tbody').on('click', 'button#edit', function() {
      $('#modal-edit').modal('show');
      var data = table.row($(this).parents('tr')).data();
      $('#edit-id').val(data.id_order);
      $('#edit-nama').val(data.nama);
      $('#edit-paket option[value="' + data.id_paket + '"]').prop('selected', true);
      $('#edit-berat').val(data.berat);
      $('#edit-status[value="' + data.status + '"]').prop('checked', true);
    });

    $('#simpan-edit').click(function(e) {
      e.preventDefault();
      var data = $('#form-edit-pesanan').serializeArray();
      $.post({
        url: url + 'edit',
        data: {
          'id_order': data[0]['value'],
          'nama': data[1]['value'],
          'id_paket': data[2]['value'],
          'berat': data[3]['value'],
          'status': data[4]['value'],
          'total': hargaTotal(data[3]['value'], data[2]['value']),
        },
        success: function() {
          $('#modal-edit').modal('hide');
          Swal.fire(
            'Disimpan',
            'Data berhasil diedit',
            'success'
          );
          table.ajax.reload();
        }
      });
    });

    //fungsi untuk menampilkan modal tambah data
    $('#tambah-data').click(function() {
      date = dateNow();
      num = randomInt(2000000, 2999999);
      $('#modal-tambah').modal('show');
      $('#tanggal-input').text('Tanggal input : ' + date);
      $('#id-order').text('Tiket Pesanan : ' + num);
    });

    //fungsi untuk menyimpan entri
    $('#simpan-data').click(function(e) {
      e.preventDefault();
      $('#modal-tambah').modal('hide');
      var data = $('#form-tambah-pesanan').serializeArray();
      console.log(data);
      $.post({
        url: url + 'tambah',
        data: {
          'nama': data[0]['value'],
          'id_paket': data[1]['value'],
          'berat': data[2]['value'],
          'id_order': num,
          'tanggal': date,
          'status': 1,
          'total': hargaTotal(data[2]['value'], data[1]['value'])
        },
        success: function() {
          Swal.fire(
            'Disimpan',
            'Data berhasil disimpan',
            'success'
          );
          $('#form-tambah-pesanan').trigger('reset');
          table.ajax.reload();
        }
      });
    });

  });
</script>