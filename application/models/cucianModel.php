<?php

class CucianModel extends CI_Model
{
  public function sedangDiproses()
  {
    $diproses = $this->db->get_where('orderan', ['status' => 2])
      ->num_rows();
    return $diproses;
  }
  public function selesai()
  {
    $selesai = $this->db->get_where('orderan', ['status' => 3])
      ->num_rows();
    return $selesai;
  }
  public function jumlahBulanIni()
  {
    $jumlahSelesai = $this->db->select('MONTH(tanggal) as tgl')
      ->from('laporan_order')->get()->result();
    $x = 0;
    foreach ($jumlahSelesai as $j) {
      if ($j->tgl == date('n')) {
        $x += 1;
      }
    }
    return $x;
  }
  public function jumlahBulanKemarin()
  {
    // $bulanSekarang = date('n');
    $jumlahKemarin = $this->db->select('MONTH(tanggal) as tgl')
      ->from('laporan_order')->get()->result();
    $x = 0;
    foreach ($jumlahKemarin as $j) {
      if ($j->tgl == date('n') - 1) {
        $x += 1;
      }
    }
    return $x;
  }
}
