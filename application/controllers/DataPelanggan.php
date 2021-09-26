<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataPelanggan extends CI_Controller
{
  public function index()
  {
    $this->load->helper('template');
    $this->load->model('PelangganModel');
    $data = [
      'pageName' => 'Data Pelanggan',
      // 'listUser' => $this->PelangganModel->dataPelanggan(),
      'listRole' => $this->PelangganModel->dataRole()->result()
    ];
    return template('pages/data_pelanggan', $data);
  }
  public function view()
  {
    $this->load->model('PelangganModel');
    $data['data'] = $this->PelangganModel->dataPelanggan()->result();
    echo json_encode($data);
  }
  public function viewId($id = null)
  {
    $this->load->model('PelangganModel');
    $data = $this->PelangganModel->pelangganId($id);
    echo json_encode($data);
  }

  public function tambah()
  {
    $this->load->model('PelangganModel');
    $data = [
      'name' => $this->input->post('name'),
      'username' => $this->input->post('uname'),
      'password' => $this->input->post('password'),
      'email' => $this->input->post('email'),
      'phone' => $this->input->post('hp'),
      'address' => $this->input->post('alamat'),
      'role_id' => $this->input->post('role')
    ];
    $this->PelangganModel->tambahPelanggan($data);
  }
  public function edit($id = null)
  {
    $this->load->model('PelangganModel');
    $data = [
      'name' => $this->input->post('name'),
      'phone' => $this->input->post('phone'),
      'address' => $this->input->post('alamat'),
      'email' => $this->input->post('email'),
      'role_id' => $this->input->post('role_id'),
      'username' => $this->input->post('username'),
      'password' => $this->input->post('password')
    ];
    $this->PelangganModel->editPelanggan($data, $id);
  }
  public function hapus()
  {
    $id = $this->input->post('id');
    $this->load->model('PelangganModel');
    $this->PelangganModel->hapusPelanggan($id);
  }
}
