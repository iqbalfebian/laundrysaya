<?php

class PesananModel extends CI_Model
{
  public function dataPesanan()
  {
    $data = $this->db->get('orderan');
    return $data;
  }
  public function hapusPesanan($id = null)
  {
    $this->db->delete('orderan', ['id_order' => $id]);
  }
  public function tambahPesanan($data = null)
  {
    $this->db->insert('orderan', $data);
  }
  public function dataPaket()
  {
    $data = $this->db->get('paket');
    return $data;
  }
  public function dataStatus()
  {
    $data = $this->db->get('status');
    return $data;
  }
  public function editPesanan($data)
  {
    if ($data['status'] != 3) {
      $this->db->update('orderan', $data, ['id_order' => $data['id_order']]);
    } else {
      $selesai = [
        'id_laporan' => 'LO' . $data['id_order'],
        'tanggal' => date('Y-m-d'),
        'nama' => $data['nama'],
        'paket' => $data['id_paket'],
        'berat' => $data['berat'],
        'total' => $data['total'],
        'status' => 'selesai'
      ];
      $this->db->insert('laporan_order', $selesai);
      $this->db->delete('orderan', ['id_order' => $data['id_order']]);
    }
  }
}
