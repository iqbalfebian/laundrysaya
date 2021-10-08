<?php

class AuthModel extends CI_Model
{
  public function cekLogin($tabel, $where)
  {
    $data = $this->db->get_where($tabel, $where);
    return $data;
  }
}
