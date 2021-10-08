<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LaporanPesanan extends CI_Controller
{
  public function index()
  {
    $this->load->helper('template');
    $data = [
      'pageName' => 'Laporan Pesanan',
    ];
    return template('pages/lap_pesanan', $data);
  }

  public function view()
  {
    $this->load->model('LaporanModel');
    $data['data'] = $this->LaporanModel->getData()->result();
    echo json_encode($data);
  }

  public function filterTabel($awal, $akhir)
  {
    $this->load->model('LaporanModel');
    $data['data'] = $this->LaporanModel->filter($awal, $akhir)->result();
    echo json_encode($data);
  }

  public function chartIndex()
  {
    $this->load->model('ChartModel');
    $data = $this->ChartModel->chartData();
    echo json_encode($data);
  }
}
