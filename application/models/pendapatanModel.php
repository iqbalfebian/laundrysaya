<?php

class PendapatanModel extends CI_Model
{
  public function bersih()
  {
    $masuk = $this->db->select('SUM(total) as total')
      ->from('laporan_order')->where('MONTH(tanggal)', date('n'))
      ->get()->row();
    $keluar = $this->db->select('SUM(jumlah) as jml')
      ->from('laporan_keluar')->where('MONTH(tanggal)', date('n'))
      ->get()->row();
    $bersih = $masuk->total - $keluar->jml;
    return $bersih;
  }
  public function kotor()
  {
    $masuk = $this->db->select('SUM(total) as total')
      ->from('laporan_order')->where('MONTH(tanggal)', date('n'))
      ->get()->row();
    return $masuk->total;
  }
}
