<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  public function index()
  {
    $this->load->helper('template');
    $this->load->helper('rupiah');
    $this->load->model('PendapatanModel');
    $this->load->model('CucianModel');
    $data = [
      'pageName' => 'Dashboard',
      'pendapatan' => rupiah($this->PendapatanModel->bersih()),
      'pendapatanKotor' => rupiah($this->PendapatanModel->kotor()),
      'diproses' => $this->CucianModel->sedangDiproses(),
      'selesai' => $this->CucianModel->selesai(),
      'bulanini' => $this->CucianModel->jumlahBulanIni(),
      'bulanKemarin' => $this->CucianModel->jumlahBulanKemarin(),
    ];
    return template('pages/dashboard', $data);
  }
}
