<?php

function template($location = null, $data = null)
{
  $ci = get_instance();
  $ci->load->view('layout/sidebar', $data);
  $ci->load->view('layout/topbar', $data);
  $ci->load->view($location, $data);
  $ci->load->view('layout/footer', $data);
}
