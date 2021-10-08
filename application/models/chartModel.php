<?php

class ChartModel extends CI_Model
{
  public function chartData()
  {
    $sql = "SELECT YEAR(tanggal) TAHUN, DATE_FORMAT(tanggal, '%M') BULAN, SUM(total) TOTAL FROM laporan_order WHERE YEAR(tanggal) = '2021' GROUP BY BULAN ORDER BY BULAN DESC;";
    $data = $this->db->query($sql)->result();
    return $data;
  }
}
