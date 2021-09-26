<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataPesanan extends CI_Controller
{
  public function index()
  {
    $this->load->helper('template');
    $this->load->model('PesananModel');
    $data = [
      'pageName' => 'Data Pesanan',
      'listPaket' => $this->PesananModel->dataPaket()->result(),
      'listStatus' => $this->PesananModel->dataStatus()->result()
    ];
    return template('pages/data_pesanan', $data);
  }
  public function view()
  {
    $this->load->model('PesananModel');
    $data['data'] = $this->PesananModel->dataPesanan()->result();
    echo json_encode($data);
  }
  public function viewId($id = null)
  {
  }

  public function tambah()
  {
    $this->load->model('PesananModel');
    $data = [
      'id_order' => $this->input->post('id_order'),
      'tanggal' => $this->input->post('tanggal'),
      'id_paket' => $this->input->post('id_paket'),
      'berat' => $this->input->post('berat'),
      'status' => $this->input->post('status'),
      'nama' => $this->input->post('nama'),
      'total' => $this->input->post('total')
    ];
    $this->PesananModel->tambahPesanan($data);
  }
  public function edit()
  {
    $this->load->model('PesananModel');
    $data = [
      'id_order' => $this->input->post('id_order'),
      'id_paket' => $this->input->post('id_paket'),
      'berat' => $this->input->post('berat'),
      'status' => $this->input->post('status'),
      'nama' => $this->input->post('nama'),
      'total' => $this->input->post('total')
    ];
    $this->PesananModel->editPesanan($data);
  }
  public function hapus()
  {
    $id = $this->input->post('id');
    $this->load->model('PesananModel');
    $this->PesananModel->hapusPesanan($id);
  }
}
