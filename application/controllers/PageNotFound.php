<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PageNotFound extends CI_Controller
{
  public function index()
  {
    $this->load->helper('template');
    return template('pages/not_found');
  }
}
