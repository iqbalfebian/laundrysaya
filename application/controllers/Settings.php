<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{
  public function index()
  {
    $this->load->model('SettingModel');
    $this->load->helper('template');
    $data = [
      'pageName' => 'Pengaturan',
    ];
    return template('pages/settings', $data);
  }

  public function logoApp()
  {
    $this->load->model('SettingModel');

    $config['upload_path']          = 'asset/logo/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = 'uploaded-img-' . date('Y-m-d');
    $config['max_size']             = 3000;
    $config['max_width']            = 3000;
    $config['max_height']           = 3000;

    $this->load->library('upload', $config);

    $old = $this->SettingModel->ambilData()->row()->logo;

    if ($_FILES['logo']['name'] != '' && $_FILES != null) {
      if (file_exists('asset/logo/' . $old)) {
        unlink('asset/logo/' . $old);
      }
      $this->upload->do_upload('logo');
      $data['logo'] = $this->upload->data('file_name');
      $this->SettingModel->simpan($data);
      $this->session->set_flashdata('pesan', "<script>Swal.fire('Data Disimpan', '', 'success');</script>");
      return redirect('settings');
    } else {
      $this->session->set_flashdata('pesan', "<script>Swal.fire('Anda belum memilih file untuk diupload!', '', 'error');</script>");
      return redirect('settings');
    }
  }

  public function simpan()
  {
    $data = [
      'nama_app' => $this->input->post('nama'),
      'email' => $this->input->post('email'),
      'alamat' => $this->input->post('alamat')
    ];

    $this->load->model('SettingModel');
    $this->SettingModel->simpan($data);
    $this->session->set_flashdata('pesan', "<script>Swal.fire('Data Disimpan', '', 'success');</script>");
    return redirect('settings');
  }
}
