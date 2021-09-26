<?php

class KaryawanModel extends CI_Model
{
  public function dataKaryawan()
  {
    $data = $this->db->where('role_id', 1)->get('user');
    return $data;
  }
}
