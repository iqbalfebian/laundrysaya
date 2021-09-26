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
          <h6 class="m-0 font-weight-bold text-primary">Tabel Pengeluaran</h6>
          <div class="opsi-tabel">
            <button class="btn btn-primary" id="tambah-data">
              Entri Baru
            </button>
            <button class="btn btn-danger" id="bersihkan">
              Bersihkan
            </button>
          </div>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                <th>No Laporan</th>
                <th>Tanggal</th>
                <th>Pengeluaran</th>
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

<!-- Modal tambah data -->
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="tambah">
        <div class="modal-body">
          <div class="row mb-4">
            <div class="col-md-6" id="tanggal-input"></div>
            <div class="col-md-6" id="id-laporan"></div>
          </div>
          <div class="form-group">
            <label for="jumlah">Jumlah Keluar Rp</label>
            <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Masukkan Jumlah">
          </div>
          <div class="form-group">
            <label for="uraian">Uraian</label>
            <textarea class="form-control" name="uraian" id="uraian" rows="3"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal detail -->
<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal edit data -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="edit">
        <div class="modal-body">
          <div class="row mb-4">
            <div class="col-md-6" id="tanggal-input"></div>
            <div class="col-md-6" id="id-laporan"></div>
          </div>
          <div class="form-group">
            <label for="jumlah">Jumlah Keluar Rp</label>
            <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Masukkan Jumlah">
          </div>
          <div class="form-group">
            <label for="uraian">Uraian</label>
            <textarea class="form-control" name="uraian" id="uraian" rows="3"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  var url = '<?= base_url() . 'index.php/datakeluaran/' ?>';
  var date = null;
  var num = null;

  function dateNow() {
    var d = new Date();
    var day = String(d.getDate()).padStart(2, '0');
    var month = String(d.getMonth() + 1).padStart(2, '0');
    var year = d.getFullYear();
    return year + '-' + month + '-' + day;
  }

  function randomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
  }

  function convertToRupiah(angka) {
    var rupiah = '';
    var angkarev = angka.toString().split('').reverse().join('');
    for (var i = 0; i < angkarev.length; i++)
      if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
    return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
  }

  function formatRibuan(angka) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split = number_string.split(','),
      sisa = split[0].length % 3,
      angka_hasil = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);
    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
      separator = sisa ? '.' : '';
      angka_hasil += separator + ribuan.join('.');
    }
    angka_hasil = split[1] != undefined ? angka_hasil + ',' + split[1] : angka_hasil;
    return angka_hasil;
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
          data: 'jumlah',
          render: function(data, type, row) {
            return convertToRupiah(data);
          }
        }
      ],
      columnDefs: [{
        targets: 3,
        defaultContent: `<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <button id="detail" type="button" class="btn btn-primary"><i class="fas fa-eye"></i></button>
                            <button id="edit" type="button" class="btn btn-success"><i class="fas fa-pencil-alt"></i></button>
                            <button id="delete" type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                          </div>`
      }]
    });

    $('#dataTable tbody').on('click', 'button#detail', function() {
      var data = table.row($(this).parents('tr')).data();
      $('#modal-detail').modal('show');
      $('#modal-detail .modal-title').text('Detail ' + data.id_laporan);
      $('#modal-detail .modal-body').html(`<p>${data.uraian}</p>`);
    });

    $('#dataTable tbody').on('click', 'button#edit', function() {
      var data = table.row($(this).parents('tr')).data();
      $('#modal-edit').modal('show');
      $('form#edit #tanggal-input').text('Tanggal Input : ' + data.tanggal);
      $('form#edit #id-laporan').text('No Laporan : ' + data.id_laporan);
      $('form#edit #jumlah').keyup(function() {
        var format = formatRibuan($(this).val());
        return $(this).val(format);
      }).val(formatRibuan(data.jumlah));
      $('form#edit #uraian').val(data.uraian);
    });

    $('form#edit button#simpan').click(function(e) {
      var data = $('form#edit').serializeArray();
      var id = $('form#edit #id-laporan').text();
      $.post({
        url: url + 'edit',
        data: {
          'id_laporan': id.slice(13, 22),
          'uraian': data[1].value,
          'jumlah': data[0].value.split('.').join('')
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
      e.preventDefault();
    });

    $('#tambah-data').click(function() {
      date = dateNow();
      num = randomInt(2000000, 2999999);

      $('form#tambah #jumlah').keyup(function() {
        var format = formatRibuan($(this).val());
        return $(this).val(format);
      });
      $('#modal-tambah').modal('show');
      $('#modal-tambah .modal-title').text('Tambah Data Pengeluaran');
      $('#tanggal-input').text('Tanggal Input : ' + date);
      $('#id-laporan').text('No Laporan : LK' + num);
    });

    $('#simpan').click(function(e) {
      var data = $('form#tambah').serializeArray();
      $.post({
        url: url + 'tambah',
        data: {
          id_laporan: 'LK' + num,
          tanggal: date,
          uraian: data[1].value,
          jumlah: data[0].value.split('.').join('')
        },
        success: function() {
          $('#modal-tambah').modal('hide');
          Swal.fire(
            'Disimpan',
            'Data berhasil ditambahkan',
            'success'
          );
          $('form#tambah').trigger('reset');
          table.ajax.reload();
        }
      });
      e.preventDefault();
    });

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
              id_laporan: data.id_laporan
            },
            success: function() {
              table.ajax.reload();
              Swal.fire('Data dihapus!', '', 'success');
            }
          });
        }
      });
    });
  });
</script>