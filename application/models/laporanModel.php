<?php

class LaporanModel extends CI_Model
{
  public function getData()
  {
    $data = $this->db->get('laporan_order');
    return $data;
  }

  public function getDataKeluar()
  {
    $data = $this->db->get('laporan_keluar');
    return $data;
  }

  public function filter($awal = null, $akhir = null)
  {
    if ($awal != '' && $akhir != '') {
      $data = $this->db->select('*')
        ->from('laporan_order')
        ->where('tanggal >=', $awal)
        ->where('tanggal <=', $akhir)
        ->get();
      return $data;
    } else {
      $data = $this->db->get('laporan_order');
      return $data;
    }
  }

  public function filterKeluar($awal = null, $akhir = null)
  {
    if ($awal != '' && $akhir != '') {
      $data = $this->db->select('*')
        ->from('laporan_keluar')
        ->where('tanggal >=', $awal)
        ->where('tanggal <=', $akhir)
        ->get();
      return $data;
    } else {
      $data = $this->db->get('laporan_keluar');
      return $data;
    }
  }

  public function jumlah($awal = null, $akhir = null)
  {
    if ($awal != '' && $akhir != '') {
      $data = $this->db->select_sum('total')
        ->from('laporan_order')
        ->where('tanggal >=', $awal)
        ->where('tanggal <=', $akhir)
        ->get();
      return $data;
    } else {
      $data = $this->db->select_sum('total')
        ->from('laporan_order')
        ->get();
      return $data;
    }
  }

  public function jumlahKeluar($awal = null, $akhir = null)
  {
    if ($awal != '' && $akhir != '') {
      $data = $this->db->select_sum('jumlah')
        ->from('laporan_keluar')
        ->where('tanggal >=', $awal)
        ->where('tanggal <=', $akhir)
        ->get();
      return $data;
    } else {
      $data = $this->db->select_sum('jumlah')
        ->from('laporan_keluar')
        ->get();
      return $data;
    }
  }
}
