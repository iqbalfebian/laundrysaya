<?php

use Mpdf\Mpdf;

defined('BASEPATH') or exit('No direct script access allowed');

class PrintLaporan extends CI_Controller
{
  public function laporanOrder()
  {
    $this->load->helper('rupiah');
    $this->load->model('LaporanModel');
    $this->load->model('SettingModel');

    $mpdf = new Mpdf();

    $tglawal = $this->input->post('tglawal');
    $tglakhir = $this->input->post('tglakhir');

    if ($tglawal != '' && $tglakhir != '') {
      $listLaporan = $this->LaporanModel->filter($tglawal, $tglakhir)->result();
      $jumlah = $this->LaporanModel->jumlah($tglawal, $tglakhir)->result();
      $data = [
        'pesanan' => $listLaporan,
        'pendapatan' => rupiah($jumlah[0]->total),
        'range' => [
          'awal' => $tglawal,
          'akhir' => $tglakhir
        ],
        'setting' => $this->SettingModel->ambilData()->row()
      ];
      $view = $this->load->view('pages/dok_pesanan', $data, true);
      $mpdf->WriteHTML(($view));
      return $mpdf->Output('laporan-pesanan-' . date('Y-m-d') . '.pdf', 'D');
    } else {
      $listLaporan = $this->LaporanModel->filter()->result();
      $jumlah = $this->LaporanModel->jumlah()->result();
      $data = [
        'pesanan' => $listLaporan,
        'pendapatan' => rupiah($jumlah[0]->total),
        'range' => [
          'awal' => '--',
          'akhir' => '--'
        ],
        'setting' => $this->SettingModel->ambilData()->row()
      ];
      $view = $this->load->view('pages/dok_pesanan', $data, true);
      $mpdf->WriteHTML(($view));
      return $mpdf->Output('laporan-pesanan-' . date('Y-m-d') . '.pdf', 'D');
    }
  }

  public function laporanKeluar()
  {
    $this->load->helper('rupiah');
    $this->load->model('LaporanModel');
    $this->load->model('SettingModel');


    $mpdf = new Mpdf();

    $tglawal = $this->input->post('tglawal');
    $tglakhir = $this->input->post('tglakhir');

    if ($tglawal != '' && $tglakhir != '') {
      $listLaporan = $this->LaporanModel->filterKeluar($tglawal, $tglakhir)->result();
      $jumlah = $this->LaporanModel->jumlahKeluar($tglawal, $tglakhir)->result();
      $data = [
        'pesanan' => $listLaporan,
        'pendapatan' => rupiah($jumlah[0]->jumlah),
        'range' => [
          'awal' => $tglawal,
          'akhir' => $tglakhir
        ],
        'setting' => $this->SettingModel->ambilData()->row()
      ];
      $view = $this->load->view('pages/dok_keluaran', $data, true);
      $mpdf->WriteHTML(($view));
      return $mpdf->Output('laporan-pengeluaran-' . date('Y-m-d') . '.pdf', 'D');
    } else {
      $listLaporan = $this->LaporanModel->filterKeluar()->result();
      $jumlah = $this->LaporanModel->jumlahKeluar()->result();
      $data = [
        'pesanan' => $listLaporan,
        'pendapatan' => rupiah($jumlah[0]->jumlah),
        'range' => [
          'awal' => '--',
          'akhir' => '--'
        ],
        'setting' => $this->SettingModel->ambilData()->row()
      ];
      $view = $this->load->view('pages/dok_keluaran', $data, true);
      $mpdf->WriteHTML(($view));
      return $mpdf->Output('laporan-pengeluaran-' . date('Y-m-d') . '.pdf', 'D');
    }
  }
}
