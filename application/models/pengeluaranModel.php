<?php

class PengeluaranModel extends CI_Model
{
  public function dataPengeluaran()
  {
    $data = $this->db->get('laporan_keluar');
    return $data;
  }
  public function tambahData($data = null)
  {
    $this->db->insert('laporan_keluar', $data);
  }
  public function editData($data = null)
  {
    $this->db->update('laporan_keluar', $data, ['id_laporan' => $data['id_laporan']]);
  }
  public function hapusData($data = null)
  {
    $this->db->delete('laporan_keluar', ['id_laporan' => $data['id_laporan']]);
  }
}
