<?php

class PelangganModel extends CI_Model
{
  public function dataPelanggan()
  {
    $data = $this->db->where('role_id', 2)->get('user');
    return $data;
  }
  public function dataRole()
  {
    $data = $this->db->get('role');
    return $data;
  }
  public function pelangganId($id = null)
  {
    $data = $this->db->get('user')->where(['id' => $id])->row();
    return $data;
  }
  public function tambahPelanggan($data = null)
  {
    $this->db->insert('user', $data);
  }
  public function editPelanggan($data = null, $id = null)
  {
    $this->db->update('user', $data, ['id' => $id]);
  }
  public function hapusPelanggan($id = null)
  {
    $this->db->delete('user', ['id' => $id]);
  }
}
