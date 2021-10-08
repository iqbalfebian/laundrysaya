<?php

function cekLogin()
{
  $ci = get_instance();
  if ($ci->session->userdata['userdata'] == null) {
    $ci->session->set_flashdata('pesan', 'Anda harus masuk dulu.');
    return redirect('admin');
  }
}
