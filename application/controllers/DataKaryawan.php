<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataKaryawan extends CI_Controller
{
  public function index()
  {
    $this->load->helper('template');
    $this->load->model('PelangganModel');
    $data = [
      'pageName' => 'Data Karyawan',
      // 'listUser' => $this->KaryawanModel->dataKaryawan(),
      'listRole' => $this->PelangganModel->dataRole()->result()
    ];
    return template('pages/data_karyawan', $data);
  }
  public function view()
  {
    $this->load->model('KaryawanModel');
    $data['data'] = $this->KaryawanModel->dataKaryawan()->result();
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
      'password' => sha1($this->input->post('password')),
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
      'password' => sha1($this->input->post('password'))
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
