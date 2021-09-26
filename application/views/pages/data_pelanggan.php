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
          <h6 class="m-0 font-weight-bold text-primary">Tabel Pelanggan</h6>
          <button class="btn btn-primary" id="tambah-data">
            Entri Baru
          </button>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- DataTable with Hover -->
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
  <!-- Row -->

  <!-- Modal Detail -->
  <div class="modal fade" id="view-user" tabindex="-1" role="dialog" aria-labelledby="view-user-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="view-user-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="view-user-body" class="modal-body p-4">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Edit Data -->
  <div class="modal fade" id="edit-user" tabindex="-1" role="dialog" aria-labelledby="edit-user-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="edit-user-title">Edit Data Pelanggan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-edit-user">
          <div class="edit-user-body p-4">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="edit-nama">Nama</label>
                <input type="text" class="form-control" id="edit-name" placeholder="Masukkan Nama">
              </div>
              <div class="form-group col-md-6">
                <label for="edit-uname">Username</label>
                <input type="text" class="form-control" id="edit-username" placeholder="Masukkan Username">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="edit-pw">Password</label>
                <input type="text" class="form-control" id="edit-password" placeholder="Masukkan Password" value="123">
              </div>
              <div class="form-group col-md-6">
                <label for="edit-email">Email</label>
                <input type="email" class="form-control" id="edit-email" placeholder="Masukkan Email">
              </div>
            </div>
            <div class="form-group">
              <p>Role</p>
              <?php foreach ($listRole as $l) : ?>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="edit-role" value="<?= $l->id; ?>">
                  <label class="form-check-label" for="edit-role"><?= $l->name; ?></label>
                </div>
              <?php endforeach; ?>
            </div>
            <div class="form-group">
              <label for="edit-email">No Handphone</label>
              <input type="text" class="form-control" id="edit-phone" placeholder="Masukkan HP">
            </div>
            <div class="form-group">
              <label for="edit-alamat">Alamat lengkap</label>
              <textarea class="form-control" id="edit-alamat" rows="3"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
            <button id="simpan-edit" type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Tambah Data -->
  <div class="modal fade" id="tambah-user" tabindex="-1" role="dialog" aria-labelledby="tambah-user-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambah-user-title">Tambah Data Pelanggan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-tambah-user">
          <div class="tambah-user-body p-4">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="tambah-nama">Nama</label>
                <input type="text" class="form-control" id="tambah-nama" placeholder="Masukkan Nama">
              </div>
              <div class="form-group col-md-6">
                <label for="tambah-uname">Username</label>
                <input type="text" class="form-control" id="tambah-uname" placeholder="Masukkan Username">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="tambah-pw">Password</label>
                <input type="text" class="form-control" id="tambah-pw" placeholder="Masukkan Password" value="123">
              </div>
              <div class="form-group col-md-6">
                <label for="tambah-email">Email</label>
                <input type="email" class="form-control" id="tambah-email" placeholder="Masukkan Email">
              </div>
            </div>
            <div class="form-group">
              <p>Role</p>
              <?php foreach ($listRole as $l) : ?>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="tambah-role" value="<?= $l->id; ?>">
                  <label class="form-check-label" for="tambah-role"><?= $l->name; ?></label>
                </div>
              <?php endforeach; ?>
            </div>
            <div class="form-group">
              <label for="tambah-email">No Handphone</label>
              <input type="text" class="form-control" id="tambah-hp" placeholder="Masukkan HP">
            </div>
            <div class="form-group">
              <label for="tambah-alamat">Alamat lengkap</label>
              <textarea class="form-control" id="tambah-alamat" rows="3"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
            <button id="simpan-tambah" type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<table>
  <tr>
    <td></td>
  </tr>
</table>



<script>
  var url = '<?= base_url() . 'index.php/datapelanggan/' ?>';
  var id = null;

  //skrip untuk load data pelanggan kedalam table menggunakan ajax datatable
  $(document).ready(function() {
    var table = $('#dataTable').DataTable({
      'info': true,
      //url controller untuk mengambil data pelanggan
      'ajax': url + 'view',
      //data yang diterima di sisipkan kedalam kolom
      'columns': [{
        'data': 'name'
      }, {
        'data': 'address'
      }, {
        'data': 'email'
      }, ],
      //membuat tombol edit,detail dan delete di index kolom ke 3
      'columnDefs': [{
        'targets': 3,
        // 'data': null,
        'defaultContent': `<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <button id="detail" type="button" class="btn btn-primary"><i class="fas fa-eye"></i></button>
                            <button id="edit" type="button" class="btn btn-success"><i class="fas fa-pencil-alt"></i></button>
                            <button id="delete" type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                          </div>`
      }]
    });

    //fungsi untuk tambah user
    $('#tambah-data').click(function() {
      $('#tambah-user').modal('show');
    });

    //fungsi tombol detail
    $('#dataTable tbody').on('click', 'button#detail', function() {
      var data = table.row($(this).parents('tr')).data();
      $('#view-user').modal('show');
      $('#view-user-title').text('Detail untuk ' + data.name);
      $('#view-user-body').html(`
      <table style="width: 100%">
        <tr>
          <td>Username</td>
          <td>${data.username}</td>
        </tr>
        <tr>
          <td>Password</td>
          <td>${data.password}</td>
        </tr>
        <tr>
          <td>Name</td>
          <td>${data.name}</td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>${data.address}</td>
        </tr>
        <tr>
          <td>Email</td>
          <td>${data.email}</td>
        </tr>
        <tr>
          <td>No HP</td>
          <td>${data.phone}</td>
        </tr>
      </table>
      `);

      $('#view-user-body table tr td:nth-child(1)').css({
        'background-color': '#D0ECE7',
        'padding': '4px',
        'border': '2px solid white'
      });
      $('#view-user-body table tr td:nth-child(2)').css({
        'background-color': '#D6EAF8',
        'padding': '4px',
        'border': '2px solid white'
      });
    });

    //fungsi tombol edit
    $('#dataTable tbody').on('click', 'button#edit', function() {
      var data = table.row($(this).parents('tr')).data();
      id = data.id;
      $('#edit-user').modal('show');
      $('#edit-user-title').text('Edit data ' + data.name);
      $('#edit-name').val(data.name);
      $('#edit-phone').val(data.phone);
      $('#edit-email').val(data.email);
      $('#edit-alamat').val(data.address);
      $('#edit-username').val(data.username);
      $('#edit-password').val(data.password);
      $('input[id="edit-role"][value="' + data.role_id + '"]').prop('checked', true);
    });

    //fungsi tombol hapus
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
              id: data.id
            },
            success: function(data) {
              console.log(data);
              table.ajax.reload();
              Swal.fire('Data dihapus!', '', 'success');
            }
          });
        } else {}
      });
    });

    //fungsi tombol simpan modal edit
    $('#simpan-edit').click(function(e) {
      e.preventDefault();
      $('#edit-user').modal('hide');
      $.post({
        url: url + 'edit/' + id,
        data: {
          'name': $('#edit-name').val(),
          'phone': $('#edit-phone').val(),
          'email': $('#edit-email').val(),
          'alamat': $('#edit-alamat').val(),
          'role_id': $('#edit-role:checked').val(),
          'username': $('#edit-username').val(),
          'password': $('#edit-password').val()
        },
        async: true,
        success: function(data) {
          Swal.fire(
            'Disimpan',
            'Data berhasil dirubah',
            'success'
          );
          table.ajax.reload();
        }
      });
    });

    //fungsi tombol simpan modal tambah
    $('#simpan-tambah').click(function(e) {
      e.preventDefault();
      $('#tambah-user').modal('hide');
      $.post({
        url: url + 'tambah',
        data: {
          'name': $('#tambah-nama').val(),
          'uname': $('#tambah-uname').val(),
          'password': $('#tambah-pw').val(),
          'email': $('#tambah-email').val(),
          'hp': $('#tambah-hp').val(),
          'alamat': $('#tambah-alamat').val(),
          'role': $('#tambah-role:checked').val()
        },
        async: true,
        success: function(data) {
          Swal.fire(
            'Disimpan',
            'Data berhasil ditambahkan',
            'success'
          );
          $('#form-tambah-user').trigger('reset');
          table.ajax.reload();
        }
      });
    });
  });
</script>