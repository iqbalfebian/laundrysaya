<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LaporanKeluar extends CI_Controller
{
  public function index()
  {
    $this->load->helper('template');
    $data = [
      'pageName' => 'Laporan Pengeluaran',
    ];
    return template('pages/lap_keluaran', $data);
  }

  public function view()
  {
    $this->load->model('LaporanModel');
    $data['data'] = $this->LaporanModel->getDataKeluar()->result();
    echo json_encode($data);
  }

  public function filterTabel($awal, $akhir)
  {
    $this->load->model('LaporanModel');
    $data['data'] = $this->LaporanModel->filterKeluar($awal, $akhir)->result();
    echo json_encode($data);
  }
}
