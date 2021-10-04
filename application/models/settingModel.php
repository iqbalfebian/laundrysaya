<?php

class SettingModel extends CI_Model
{
  public function ambilData()
  {
    $data = $this->db->get('pengaturan');
    return $data;
  }
  public function simpan($data = null)
  {
    $db = $this->db->get('pengaturan')->row();
    if (!$db) {
      $this->db->insert('pengaturan', $data);
    } else {
      $this->db->update('pengaturan', $data, ['nama_app' => $db->nama_app]);
    }
  }
}
