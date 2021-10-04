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
      <img style="width: 120px;" src="https://img.icons8.com/external-konkapp-outline-color-konkapp/64/000000/external-laundry-shop-laundry-konkapp-outline-color-konkapp.png" />
    </div>
    <div class="column right">
      <h2>Laundry Saya</h2>
      <p>
        Ds. Bintang Alam Blok E2 no.09 <br>
        Kec. Telukjambe Timur, Kab. Karawang
      </p>
      <p>Telp: 085156587124</p>
    </div>
  </div>
  <hr>
  <br><br>
  <h3>Laporan Pengeluaran</h3>
  <span>Tanggal Print : <?= date('Y-m-d H:i:s'); ?></span><br>
  <span>Tanggal Laporan : <?= $range['awal'] . ' s/d ' . $range['akhir']; ?></span>
  <br><br>
  <table id="customers">
    <tr>
      <th>No Laporan</th>
      <th>Tanggal</th>
      <th>Deskripsi</th>
      <th>Jumlah Keluar</th>
    </tr>
    <?php foreach ($pesanan as $p) : ?>
      <tr>
        <td><?= $p->id_laporan; ?></td>
        <td><?= $p->tanggal; ?></td>
        <td><?= $p->uraian; ?></td>
        <td><?= rupiah($p->jumlah); ?></td>
      </tr>
    <?php endforeach; ?>
    <tr>
      <td colspan="3"><b>TOTAL :</b></td>
      <td><b><?= $pendapatan; ?></b></td>
    </tr>
  </table>

</body>

</html>