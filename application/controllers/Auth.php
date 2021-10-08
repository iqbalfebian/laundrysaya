<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function index()
  {
    $this->load->view('auth/loginuser');
  }
  public function loginUser()
  {
    $this->load->model('AuthModel');
    $data = [
      'username' => $this->input->post('username'),
      'password' => sha1($this->input->post('password'))
    ];
    $userdata = $this->AuthModel->cekLogin('user', $data)->num_rows();
    if ($userdata > 0) {
      $sessData = [
        'userdata' => [
          'username' => $data['username'],
          'isLogin' => true
        ]
      ];
      $this->session->set_userdata($sessData);
      return redirect('dasbor');
    } else {
      $this->session->set_flashdata('pesan', 'Username atau password salah!');
      return redirect('admin');
    }
  }
  public function logoutUser()
  {
    $this->session->unset_userdata('userdata');
    $this->session->set_flashdata('pesan', 'Berhasil logout');
    return redirect('admin');
  }
  function daftarUser()
  {
  }
}
