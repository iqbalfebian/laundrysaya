<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataKeluaran extends CI_Controller
{
  public function index()
  {
    $this->load->helper('template');
    $this->load->model('PengeluaranModel');
    $data = [
      'pageName' => 'Data Pengeluaran',
    ];
    return template('pages/data_keluaran', $data);
  }

  public function view()
  {
    $this->load->model('PengeluaranModel');
    $data['data'] = $this->PengeluaranModel->dataPengeluaran()->result();
    echo json_encode($data);
  }

  public function tambah()
  {
    $this->load->model('PengeluaranModel');
    $data = [
      'id_laporan' => $this->input->post('id_laporan'),
      'tanggal' => $this->input->post('tanggal'),
      'uraian' => $this->input->post('uraian'),
      'jumlah' => $this->input->post('jumlah')
    ];
    $this->PengeluaranModel->tambahData($data);
  }

  public function edit()
  {
    $this->load->model('PengeluaranModel');
    $data = [
      'id_laporan' => $this->input->post('id_laporan'),
      'uraian' => $this->input->post('uraian'),
      'jumlah' => $this->input->post('jumlah')
    ];
    $this->PengeluaranModel->editData($data);
  }

  public function hapus()
  {
    $this->load->model('PengeluaranModel');
    $data['id_laporan'] = $this->input->post('id_laporan');
    $this->PengeluaranModel->hapusData($data);
  }
}
