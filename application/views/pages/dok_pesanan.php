<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    * {
      box-sizing: border-box;
      font-family: Arial, Helvetica, sans-serif;
    }

    /* Create two unequal columns that floats next to each other */
    .column {
      float: left;
      padding: 10px;
      height: 150px;
      /* Should be removed. Only for demonstration */
    }

    .left {
      width: 10%;
    }

    .right {
      width: 75%;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #customers td,
    #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #customers tr:hover {
      background-color: #ddd;
    }

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #04AA6D;
      color: white;
    }
  </style>
</head>

<body>
  <div class="row">
    <div class="column left">
      <img style="width: 120px;" src="<?= file_exists('asset/logo/' . $setting->logo) ? base_url() . 'asset/logo/' . $setting->logo : base_url() . 'asset/logo/logo.png'; ?>" />
    </div>
    <div class="column right">
      <h2><?= $setting->nama_app; ?></h2>
      <p>
        <?= $setting->alamat; ?>
      </p>
      <p>Email : <?= $setting->email; ?></p>
    </div>
  </div>
  <hr>
  <br><br>
  <h3>Laporan Pesanan</h3>
  <span>Tanggal Print : <?= date('Y-m-d H:i:s'); ?></span><br>
  <span>Tanggal Laporan : <?= $range['awal'] . ' s/d ' . $range['akhir']; ?></span>
  <br><br>
  <table id="customers">
    <tr>
      <th>No Pesanan</th>
      <th>Nama Customer</th>
      <th>Paket/Berat</th>
      <th>Status</th>
      <th>Jumlah</th>
    </tr>
    <?php foreach ($pesanan as $p) : ?>
      <tr>
        <td><?= $p->id_laporan; ?></td>
        <td><?= $p->nama; ?></td>
        <td><?= $p->paket . '/' . $p->berat; ?></td>
        <td><?= $p->status; ?></td>
        <td><?= rupiah($p->total); ?></td>
      </tr>
    <?php endforeach; ?>
    <tr>
      <td colspan="4"><b>TOTAL :</b></td>
      <td><b><?= $pendapatan; ?></b></td>
    </tr>
  </table>

</body>

</html>